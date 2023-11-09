<h3>My Profile</h3>
<main class="profile-main">
    <div class="information">
        <img src="anh/5.png" alt="" class="profile-img">
        <p>Tao vẫn là tao!!</p>
    </div>
    <div class="document">
        <ul>
            <li>
                <p>Tên: ???</p>
            </li>
            <li>
                <p>Email: ???</p>
            </li>
            <li>
                <p>Ngày sinh: ??</p>
            </li>
            <li>
                <p>Sở Thích: ???</p>
            </li>
        </ul>
    </div>
</main>

<footer class="footer">
    <p>&copy; 2023 FPT POLYTECHNIC. TEAM T^4.</p>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const profile = document.querySelector(".profile");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        profile.addEventListener("click", function() {
            dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
        });
    });
</script>