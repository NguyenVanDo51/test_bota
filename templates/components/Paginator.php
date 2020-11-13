<div aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        if (isset($currentPage) && isset($totalPage) && $totalPage > 1) {
            if ($currentPage > 1 && $totalPage > 1) {
                echo '<li class="page-item"><a href="/product?controller=Product&action=index&page=' . ($currentPage - 1) . '&orderby=' . $orderBy . '&index=' . $index . '" class="page-link">Trang trước</a> </li> ';
            }
            // Lặp khoảng giữa
            for ($i = 1; $i <= $totalPage; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $currentPage) {
                    echo '<li class="page-item"><button disabled class="page-link text-muted">' . $i . '</button></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="/product?controller=Product&action=index&page=' . $i . '&orderby=' . $orderBy . '&index=' . $index . '">' . $i . '</a></li>';
                }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($currentPage < $totalPage && $totalPage > 1) {
                echo '<li class="page-item"><a class="page-link" href="/product?controller=Product&action=index&page=' . ($currentPage + 1) . '&orderby=' . '&index=' . $index . $orderBy . '">Trang sau</a></li>';
            }
        }
        ?>
    </ul>
</div>
