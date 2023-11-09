</div>

<script>
    let checkall = document.getElementById('checkall');
    let clearall = document.getElementById('clearall');
    let deleteall = document.getElementById('deleteall');

    let checkboxx = document.getElementsByClassName('checkboxx');
    checkall.addEventListener('click', function(){
        for (let i = 0; i < checkbox.length; i++){
            checkbox[i].checked = true;
        }
    });
    clearall.addEventListener('click', function(){
        for (let i = 0; i < checkbox.length; i++){
            checkbox[i].checked = false;
        }
    });
    //funciton để kiểm tra  nguuoiwf dùng có check phần tử nào không
    function check_select(){
        for (let i = 0;i<checkbox.length; i++){
            if (checkbox[i].checked === true)
            return true;
        }
        return false;
    }
    //xóa
    deleteall.addEventListener('click', function(event){
        if(check_selected()===false){
            alert("Bạn cần ít nhất 1 phần tử để xóa");
            event.preventDefault();
            return false;
        }
    })
</script>
</body>

</html>