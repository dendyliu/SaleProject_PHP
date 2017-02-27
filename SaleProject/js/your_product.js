	function validateDelete(x){
        if (confirm("Do you want to delete this product?")){
        	location.href='delete.php?id_active='+x;
        }
	}