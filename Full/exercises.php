<?php
include 'in/head.php';
include 'class/dictoryClass.php';
include 'class/exercisesClass.php';

$dictoryClass = new DirectoryClass;
$exercisesClass = new exercisesClass;


$dictoryId = isset($_GET['dictoryId']) ? $_GET['dictoryId'] : null;

$selectAll = $dictoryClass->select_dictory_All();
$exercises = $dictoryId ? $exercisesClass->select_exercises_by_dictory($dictoryId) : null;

include 'in/navv.php';
?>

<!-- Main Layout -->
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar Mục Lục -->
        <aside class="col-md-3">
            <div class="bg-light p-3 border rounded">
                <h5>Mục Lục</h5>
                <ul class="list-unstyled">
                    <?php
                    if ($selectAll->num_rows > 0) {
                        while ($result = $selectAll->fetch_assoc()) {
                    ?>
                            <li><a href="exercises.php?dictoryId=<?php echo htmlspecialchars($result['dictoryId']); ?>"><?php echo htmlspecialchars($result['dictoryName']); ?></a></li>
                    <?php
                        }
                    } else {
                        echo '<li>Không có thư mục nào</li>';
                    }
                    ?>
                </ul>
            </div>
        </aside>

        <!-- Danh sách bài tập -->
        <div class="col-md-9">
            <div class="list-group">
                <?php if ($dictoryId): ?>
                    <h2>Danh sách bài tập</h2>
                    <?php if ($exercises && $exercises->num_rows > 0): ?>
                        <ul class="exercise-list list-unstyled">
                            <?php while ($row = $exercises->fetch_assoc()): ?>
                                <li class="exercise-item mb-3 p-3 border rounded">
                                    <div>
                                        
                                        <h3>
                                            <a href="view.php?pdfId=<?php echo htmlspecialchars($row['pdfId']); ?>"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                style="cursor: pointer; color: blue; text-decoration: underline;">
                                                <?php echo htmlspecialchars($row['exercisesName'] ?? 'Không có tiêu đề'); ?>
                                            </a>
                                        </h3>

                                        <p class="text-muted"><?php echo htmlspecialchars($row['exercisesDes'] ?? 'Không có mô tả'); ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-muted">Không có bài tập nào trong thư mục này.</p>
                    <?php endif; ?>
                <?php else: ?>
                    <h2>Chọn một thư mục để xem bài tập</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>