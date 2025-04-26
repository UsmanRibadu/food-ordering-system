<?php include('partials-front/menu.php'); ?>

<!-- FOOD SEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>

<!-- FOOD MENU Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Product Menu</h2>

        <?php 
        $id = $_GET['category_id'];
            $sql = "SELECT * FROM tbl_food WHERE category_id = '$id'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
        ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <?php if ($image_name == "") { ?>
                    <div class="error">Image not Available.</div>
                <?php } else { ?>
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                <?php } ?>
            </div>

            <div class="food-menu-desc">
                <h4><?php echo htmlspecialchars($title); ?></h4>
                <p class="food-price">₦<?php echo $price; ?></p>
                <p class="food-detail"><?php echo htmlspecialchars($description); ?></p>
                <br>

                <!-- Preview Button -->
                <a href="javascript:void(0);" 
                   class="btn btn-secondary preview-btn"
                   data-title="<?php echo htmlspecialchars($title); ?>" 
                   data-description="<?php echo htmlspecialchars($description); ?>" 
                   data-price="<?php echo $price; ?>" 
                   data-image="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>">
                   Preview
                </a>

                <!-- Order Button -->
                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
            </div>
        </div>
        <?php 
                }
            } else {
                echo "<div class='error'>Goods not found.</div>";
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>

<!-- PREVIEW MODAL -->
<div id="previewModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="previewImage" src="" alt="Food Image" />
        <h3 id="previewTitle"></h3>
        <p class="food-price" id="previewPrice"></p>
        <p id="previewDescription"></p>
    </div>
</div>

<!-- STYLES -->
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #fdfdfd;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    width: 85%;
    margin: auto;
}

.food-search {
    background: #f8f9fa;
    padding: 50px 0;
    text-align: center;
}

.food-search input[type="search"] {
    padding: 12px;
    width: 70%;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
    outline: none;
    font-size: 16px;
}

.food-search .btn-primary {
    padding: 13px 25px;
    border: none;
    background-color: #ff4757;
    color: white;
    font-size: 16px;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
}

.food-menu {
    padding: 60px 0;
    background-color: #fff;
}

.food-menu h2 {
    font-size: 32px;
    margin-bottom: 40px;
    color: #2f3542;
    text-align: center;
}

.food-menu-box {
    display: flex;
    background-color: #f1f2f6;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.food-menu-img {
    flex: 1;
    max-width: 200px;
}

.food-menu-img img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 10px 0 0 10px;
}

.food-menu-desc {
    flex: 2;
    padding: 20px;
}

.food-menu-desc h4 {
    font-size: 22px;
    margin: 0;
    color: #333;
}

.food-price {
    color: #ff4757;
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
}

.food-detail {
    font-size: 15px;
    color: #666;
}

.btn-primary,
.btn-secondary {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6b81;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 600;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.btn-secondary {
    background-color: #57606f;
}

.btn-primary:hover {
    background-color: #ff4757;
}

.btn-secondary:hover {
    background-color: #2f3542;
}

.error {
    color: red;
    padding: 10px;
    font-size: 16px;
    text-align: center;
}

.clearfix {
    clear: both;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1001;
    right: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.5);
    transition: all 0.5s ease;
}

.modal-content {
    position: absolute;
    right: -100%;
    top: 0;
    height: 100%;
    width: 100%;
    max-width: 500px;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px 0 0 10px;
    box-shadow: -2px 0 8px rgba(0,0,0,0.2);
    transition: right 0.5s ease;
    overflow-y: auto;
}

.modal.show .modal-content {
    right: 0;
}

.modal-content img {
    max-width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 20px;
}

.modal-content h3 {
    margin: 10px 0;
    font-size: 24px;
    color: #333;
}

.modal-content .food-price {
    color: #e84118;
    font-size: 18px;
    font-weight: bold;
}

.modal-content p {
    color: #555;
    font-size: 16px;
    margin-bottom: 10px;
}

.close {
    color: #aaa;
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 30px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #333;
}
</style>

<!-- SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const previewBtns = document.querySelectorAll('.preview-btn');
    const modal = document.getElementById('previewModal');
    const modalContent = modal.querySelector('.modal-content');
    const closeModal = document.querySelector('.close');
    const previewImage = document.getElementById('previewImage');
    const previewTitle = document.getElementById('previewTitle');
    const previewPrice = document.getElementById('previewPrice');
    const previewDescription = document.getElementById('previewDescription');

    previewBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            previewImage.src = this.getAttribute('data-image');
            previewTitle.textContent = this.getAttribute('data-title');
            previewPrice.textContent = '₦' + this.getAttribute('data-price');
            previewDescription.innerHTML = this.getAttribute('data-description').replace(/\n/g, '<br>');

            modal.style.display = 'block';
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
        });
    });

    closeModal.addEventListener('click', () => {
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 500);
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        }
    });
});
</script>
