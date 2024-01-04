
<main>  
    <section class="courses">
        <h2>Thông Tin - <?php foreach ($list_tb as $tb) { echo $tb['tenthongbao']; } ?></h2>
        <br>
<div class="container">
      <h1>Thông báo : <?php foreach ($list_tb as $tb) { echo $tb['tenthongbao']; } ?></h1>
    <hr>
        <h2>Nội dung</h2>
        <p><?php foreach ($list_tb as $tb) { echo $tb['noidung']; } ?></p>
    
     
      <p>Người đăng: admin</p>
      <p>Thời gian: <?php foreach ($list_tb as $tb) { echo $tb['ngaydang']; } ?></p>
</div>
    </section>
</main>

<style>
.container {
  width: 80%;
  margin: 0 auto;
  border: 1px solid #ccc;
  background-color: white;
}
</style>