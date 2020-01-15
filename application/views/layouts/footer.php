    </div>
  </div>
</div>
	<div class="col-md-12" id="footer" style="height: 50px; padding: 15px">
		<small>Copyright <?= date('Y') ?> By Andri Faisal Sentosa, All Right Reserved.</small>
	</div>


	<script type="text/javascript">

	function showBarang(str) 
	{

	    if (str == "") {
	        $('#nama_barang').val('');
	        $('#harga_barang').val('');
	        $('#qty').val('');
	        $('#sub_total').val('');
	        $('#reset').hide();
	        return;
	    } else { 
	      if (window.XMLHttpRequest) {
	          // code for IE7+, Firefox, Chrome, Opera, Safari
	           xmlhttp = new XMLHttpRequest();
	      } else {
	          // code for IE6, IE5
	          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	      }
	      xmlhttp.onreadystatechange = function() {
	           if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	              document.getElementById("barang").innerHTML = 
	              xmlhttp.responseText;
	          }
	      }
	      xmlhttp.open("GET", "<?= base_url(
	        'index.php/kasir/getbarang') ?>/"+str,true);
	      xmlhttp.send();
	    }
	}

	function subTotal(qty)
	{

		var harga = $('#harga_barang').val().replace(".", "").replace(".", "");

		$('#sub_total').val((harga*qty));
    // convertToRupiah
	}

	function convertToRupiah(angka)
	{

	    var rupiah = '';    
	    var angkarev = angka.toString().split('').reverse().join('');
	    
	    for(var i = 0; i < angkarev.length; i++) 
	      if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	    
	    return rupiah.split('',rupiah.length-1).reverse().join('');
	
	}

	var table;
    $(document).ready(function() {

      showKembali($('#bayar').val());

      table = $('#table_transaksi').DataTable({ 
        paging: false,
        "info": false,
        "searching": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' 
        // server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= site_url('kasir/ajax_list_transaksi')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,1,2,3,4,5,6 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {

      table.ajax.reload(null,false); //reload datatable ajax 
    
    }

    function addbarang()
    {
        var id_barang = $('#id_barang').val();
        var qty = $('#qty').val();
        if (id_barang == '') {
          $('#id_barang').focus();
        }else if(qty == ''){
          $('#qty').focus();
        }else{
       // ajax adding data to database
          $.ajax({
            url : "<?= site_url('kasir/addbarang')?>",
            type: "POST",
            data: $('#form_transaksi').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding data');
            }
        });

          showTotal();
          showKembali($('#bayar').val());
          //mereset semua value setelah btn tambah ditekan
          $('.reset').val('');
        };
    }

    function deletebarang(id,sub_total)
    {
        // ajax delete data to database
          $.ajax({
            url : "<?= site_url('kasir/deletebarang')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

          var ttl = $('#total').val().replace(".", "");

          $('#total').val(convertToRupiah(ttl-sub_total));

          showKembali($('#bayar').val());
    }

    function showTotal()
    {

    	var total = $('#total').val().replace(".", "").replace(".", "");

    	var sub_total = $('#sub_total').val().replace(".", "").replace(".", "");

    	$('#total').val(convertToRupiah((Number(total)+Number(sub_total))));

  	}

  	//maskMoney
	$('.uang').maskMoney({
		thousands:'.', 
		decimal:',', 
		precision:0
	});

	function showKembali(str)
  	{
	    var total = $('#total').val().replace(".", "").replace(".", "");
	    var bayar = str.replace(".", "").replace(".", "");
	    var kembali = bayar-total;

	    $('#kembali').val(convertToRupiah(kembali));

	    if (kembali >= 0) {
	      $('#selesai').removeAttr("disabled");
	    }else{
	      $('#selesai').attr("disabled","disabled");
	    };

	    if (total == '0') {
	      $('#selesai').attr("disabled","disabled");
	    };
  	}

	</script>
</body>
</html>