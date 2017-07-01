<!-- Kategori & List barang -->
<section class="category-top-section">
    <div class="catalog">
        <div class="ui stackable grid">
            <div class="four wide column">
                <div class="category-section">
                    <div class="ui fluid vertical borderless menu" id="category">

                        <div class="item">
                            <div class="ui header">
                                Product Category
                            </div>
                            <div id="category-list"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="twelve wide column">
                <div class="title-product-section">
                   

                <section class="ui very padded segment square" id="category-lowongan">
                    <div class="content-catalog">
                        <div class="ui grid" id="category_grid_list">
                        </div>
                    </div>
                </section> 



             
                </div>
            </div>

        </div>
    </div>
  <div class="ui modal" id="detail">
    <div class="header" id="title_detail">
      <span>Profile Picture</span>
    </div>
    <div class="image content">
      <div class="ui medium image">
        <img src="/images/avatar/large/chris.jpg">
      </div>
      <div class="description">
        <div class="ui header">Specification</div>
          <ul class="ui list" id="modal_detail">
          </ul>
      </div>
    </div>

    <div class="actions">
      <div class="ui black deny button">
        <i class="remove icon"></i>
        Close 
      </div> 
    </div>
  </div>

<script type="text/javascript">
  var kategori = ['Motherboard', 'Processor', 'Storage', 'VGA', 'PSU', 'RAM','Casing'];
  <?php
    if(empty($_GET['c'])){
        $active_index = "Motherboard";
    }
    else {
        $active_index = $_GET['c']; 
    }
  ?>
  var active_index_global = "<?= $active_index ?>";
  active_index_global = active_index_global.toLowerCase();
  var last_category_global = null;

  function changeKategoriList(active_index){
    document.getElementById('category_grid_list').innerHTML = "Loading";
    $.ajax({
          url: 'https://api.gravicodev.id/barang/v1/'+ active_index.toLowerCase() +'/index.php',         
          type: 'GET',
          crossDomain: true,
          dataType: 'json',
          success: function(json) {
              // Rates are in `json.rates`
              // Base currency (USD) is `json.base`
              // UNIX Timestamp when rates were collected is in `json.timestamp`        
              last_category_global = active_index_global.toLowerCase();
              active_index_global = json.data[0].jenis.toLowerCase();
              if(json.status || json.status == 1){
                changeModalDetail(json.data[0].jenis.toLowerCase());
                setDetailCard(json,json.data[0].jenis.toLowerCase());
              }
              console.log(json);
          }
      }); 

  }

  function createButtonDetail(active_index,data){
      var buttonDetail = document.createElement("button");
      buttonDetail.className = "ui fluid button";
      buttonDetail.id = "btnDetail_" + data.id;
      if(active_index == "motherboard"){
        buttonDetail.onclick = (function(id,nama,socket,vendor,ram,ram_slot,pcie_slot,harga,stok){return function(){detailMotherboard(id,nama,socket,vendor,ram,ram_slot,pcie_slot,harga,stok);}})(data.id,data.nama,data.socket,data.vendor,data.ram,data['ram slot'],data['pcie slot'],data.harga,data.stok);
      } else if(active_index == "processor"){
        buttonDetail.onclick = (function(id,nama,socket,vendor,clock_speed,harga,stok){return function(){detailProc(id,nama,socket,vendor,clock_speed,harga,stok);}})(data.id,data.nama,data.socket,data.vendor,data['clock speed'],data.harga,data.stok);
      } else if(active_index == "storage"){
        buttonDetail.onclick = (function(id,nama,vendor,storage_type,harga,stok){return function(){detailStorage(id,nama,vendor,storage_type,harga,stok);}})(data.id,data.nama,data.vendor,data['storage type'],data.harga,data.stok);
      } else if(active_index == "vga"){
        buttonDetail.onclick = (function(id,nama,vendor,memory_type,ram_size,harga,stok){return function(){detailVga(id,nama,vendor,memory_type,ram_size,harga,stok);}})(data.id,data.nama,data.vendor,data['memory type'],data['ram size'],data.harga,data.stok);
      } else if(active_index == "psu"){
        buttonDetail.onclick = (function(id,nama,vendor,kapasitas,modular,harga,stok){return function(){detailPsu(id,nama,vendor,kapasitas,modular, harga,stok);}})(data.id,data.nama,data.vendor,data.kapasitas,data.modular,data.harga,data.stok);
      } else if(active_index == "ram"){
        buttonDetail.onclick = (function(id,nama,vendor,kapasitas,speed, ram_type,harga,stok){return function(){detailRam(id,nama,vendor,kapasitas,speed, ram_type,harga,stok);}})(data.id,data.nama,data.vendor,data.kapasitas,data.speed,data['ram_type'],data.harga,data.stok);
      } else if(active_index == "casing"){
        buttonDetail.onclick = (function(id,nama,vendor,harga,stok){return function(){detailCasing(id,nama,vendor,harga,stok);}})(data.id,data.nama,data.vendor,data.harga,data.stok);
      }
      buttonDetail.innerHTML = '<i class="expand icon"></i>Detail';

      return buttonDetail;
  }

  function setDetailCard(json,active_index){
    $('#category_grid_list').empty();
    if(last_category_global != null){
      $('#kategori_'+last_category_global).removeClass("active");
    }
    $('#kategori_'+active_index_global).addClass("active");

    for(var i = 0; i < json.data.length; i++){
      var divContainer = document.createElement('div');
      divContainer.className = "five wide column";
      var divCard = document.createElement('div');
      divCard.className = "ui card";
      var divCardLabelHarga = document.createElement('div');
      divCardLabelHarga.className = "ui top attached label";
      divCardLabelHarga.id = "harga";
      divCardLabelHarga.innerHTML = "Rp " + json.data[i].harga;
      var divImageContainer = document.createElement('div');
      divImageContainer.className = "image";
      var divLabelInsideImage = document.createElement('div');
      divLabelInsideImage.className = "ui bottom attached label";
      divLabelInsideImage.id = "vendor_detail";
      divLabelInsideImage.innerHTML = json.data[i].vendor + " " + json.data[i].nama;
      var image =document.createElement('img');
      image.src = "public/images/grav.png";
      divImageContainer.appendChild(divLabelInsideImage);
      divImageContainer.appendChild(image)
      var divContent = document.createElement('div');
      divContent.className = "content";
      var buttonDetail = createButtonDetail(active_index,json.data[i]);
      var divButtonAddToCart = document.createElement('div');
      divButtonAddToCart.className = "extra content";
      var buttonAddToCart = document.createElement('button');
      buttonAddToCart.className = "ui green fluid button";
      buttonAddToCart.id = json.data[i].id;
      buttonAddToCart.onclick = (function(jenis,id,nama,harga){return function(){addToCart(jenis,id,nama,harga,1);}})(json.data[i].jenis,json.data[i].id,json.data[i].nama,json.data[i].harga);
      buttonAddToCart.innerHTML = '<i class="add to cart icon"></i>Buy';

      divContent.appendChild(buttonDetail);
      divButtonAddToCart.appendChild(buttonAddToCart)
      divCard.appendChild(divCardLabelHarga);
      divCard.appendChild(divImageContainer);
      divCard.appendChild(divContent);
      divCard.appendChild(divButtonAddToCart);
      divContainer.appendChild(divCard);
      document.getElementById('category_grid_list').appendChild(divContainer);
    }
  }

  function changeModalDetail(active_index){
    $('#modal_detail').empty();
    if(active_index.toLowerCase() == "motherboard"){
      var li = document.createElement('li');
      li.innerHTML = 'Socket = <span id="socket"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Vendor = <span id="vendor"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Jenis Ram = <span id="jenis_ram"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Slot Ram = <span id="slot_ram"> </span >';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Slot Pcie = <span id="slot_pcie"> </span >';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Harga = Rp <span id="harga_detail"></span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Stok = <span id="stock"> </span>';
      document.getElementById('modal_detail').appendChild(li);
    } else if(active_index.toLowerCase() == "processor"){
      var li = document.createElement('li');
      li.innerHTML = 'Socket = <span id="socket"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Vendor = <span id="vendor"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Clock Speed = <span id="clock_speed"></span> MHz';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Harga = Rp <span id="harga_detail">  </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Stok = <span id="stock"> </span>';
      document.getElementById('modal_detail').appendChild(li);
    } else if(active_index.toLowerCase() == "storage"){
      var li = document.createElement('li');
      li.innerHTML = 'Storage Type = <span id="storage_type"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Vendor = <span id="vendor"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Harga = Rp <span id="harga_detail">  </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Stok = <span id="stock"> </span>';
      document.getElementById('modal_detail').appendChild(li);
    } else if(active_index.toLowerCase() == "vga"){
      var li = document.createElement('li');
      li.innerHTML = 'Memory Type = <span id="memory_type"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Memory size = <span id="memory_size"> </span> MB ';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Vendor = <span id="vendor"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Harga = Rp <span id="harga_detail">  </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Stok = <span id="stock"> </span>';
      document.getElementById('modal_detail').appendChild(li);
    } else if(active_index.toLowerCase() == "psu"){
      var li = document.createElement('li');
      li.innerHTML = 'Kapasitas = <span id="kapasitas"></span> WATT ';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Modular = <span id="modular"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Vendor = <span id="vendor"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Harga = Rp <span id="harga_detail">  </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Stok = <span id="stock"> </span>';
      document.getElementById('modal_detail').appendChild(li);
    } else if(active_index.toLowerCase() == "ram"){
      var li = document.createElement('li');
      li.innerHTML = 'Kapasitas = <span id="kapasitas"></span> MB ';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Speed = <span id="speed"></span>MHz';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Jenis Ram = <span id="ram_type"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Vendor = <span id="vendor"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Harga = Rp <span id="harga_detail">  </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Stok = <span id="stock"> </span>';
      document.getElementById('modal_detail').appendChild(li);
    } else if(active_index.toLowerCase() == "casing"){
      var li = document.createElement('li');
      li.innerHTML = 'Vendor = <span id="vendor"> </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Harga = Rp <span id="harga_detail">  </span>';
      document.getElementById('modal_detail').appendChild(li);
      var li = document.createElement('li');
      li.innerHTML = 'Stok = <span id="stock"> </span>';
      document.getElementById('modal_detail').appendChild(li);
    }


  }

  function createCategoryList(){
    for(var i = 0; i < kategori.length; i++){
      var a = document.createElement('a');
      if(active_index_global.toLowerCase() == kategori[i].toLowerCase()){
        a.className = "item kategori active";
      }else{
        a.className = "item kategori";
      }
      a.id = "kategori_" + kategori[i].toLowerCase();
      a.onclick =  (function(active_index){return function(){changeKategoriList(active_index);}})(kategori[i]);
      a.innerHTML = kategori[i];
      document.getElementById("category-list").appendChild(a);
    }
  }

  function init(){
    createCategoryList();
    changeKategoriList(active_index_global);
    changeModalDetail(active_index_global);
  }

  
  function detailMotherboard(id,nama_barang,socket,vendor,jenis_ram,slot_ram,slot_pcie,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#socket').text(socket);
      $('#vendor').text(vendor);
      $('#jenis_ram').text(jenis_ram);
      $('#slot_ram').text(slot_ram);
      $('#slot_pcie').text(slot_pcie);
      $('#harga_detail').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }

  function detailProc(id,nama_barang,socket,vendor,clock_speed,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#socket').text(socket);
      $('#vendor').text(vendor);
      $('#clock_speed').text(clock_speed);
      $('#harga_detail').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }

  function detailStorage(id,nama_barang,vendor,storage_type,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#vendor').text(vendor);
      $('#storage_type').text(storage_type);
      $('#harga_detail').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }

  function detailVga(id,nama_barang,vendor,memory_type,memory_size,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#vendor').text(vendor);
      $('#memory_type').text(memory_type);
      $('#memory_size').text(memory_size);
      $('#harga_detail').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }

  function detailPsu(id,nama_barang,vendor,kapasitas,modular,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#vendor').text(vendor);
      $('#kapasitas').text(kapasitas);
      $('#modular').text(modular);
      $('#harga_detail').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }

  function detailRam(id,nama_barang,vendor,kapasitas,speed,ram_type,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#vendor').text(vendor);
      $('#kapasitas').text(kapasitas);
      $('#speed').text(speed);
      $('#ram_type').text(ram_type);
      $('#harga_detail').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }

   function detailCasing(id,nama_barang,vendor,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#vendor').text(vendor);
      $('#harga_detail').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }

  init();

</script>

</section>