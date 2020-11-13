<div>
    <form action="/search" method="get">
        <input type="text" name="search" value="<?= isset($search) ? $search : '' ?>" placeholder="Tìm kiếm">
        <input type="hidden" name="controller" value="Product" placeholder="Tìm kiếm">
        <input type="hidden" name="action" value="search" placeholder="Tìm kiếm">
        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        <?= isset($search) ? '<button class="btn" type="button" onclick="onBack()">Hủy</button>' : '' ?>
    </form>
    <div class="my-2">
        <a href="/products?controller=Product&action=index&orderby=title&index=<?= $index === "ASC" ? "DESC" : "ASC" ?>">
            Sắp xếp theo tên <?= $index === "ASC" ? "(A-Z)" : "(Z-A)" ?></a>
        <a class="mx-3"  href="/products?controller=Product&action=index&orderby=price&index=<?= $index === "ASC" ? "DESC" : "ASC" ?>">
            Sắp xếp theo giá <?= $index === "ASC" ? "(Thấp đến Cao)" : "(Cao - thấp)" ?></a>
        <?= isset($orderBy) && $orderBy !== '' ? '<a href="/products?controller=Product&action=index&orderby=">Hủy bỏ sắp xếp</a>' : '' ?>
    </div>

</div>
<?= isset($search) ? '<p class="mt-2">Hiển thị kết quả tìm kiếm cho từ khóa: "' . $search . '"</p>' : '' ?>
<script>
    function onBack() {
        window.history.back()
    }
</script>
