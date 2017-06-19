<!-- Kategori & List barang -->
<section class="category-top-section">
    <div class="catalog">
        <div class="ui stackable grid">
            <div class="four wide column">
                <div class="category-section">
                    <div class="ui fluid vertical borderless menu" id="category-lowongan">

                        <div class="item">
                            <div class="ui header">
                                Product Category
                            </div>
                        </div>
                        <?php 
                        $list_kategory = ['Motherboard', 'Processor', 'Storage', 'VGA', 'PSU', 'RAM','Casing'];                        
                        if(empty($_GET['c'])){
                            $active_index = $list_kategory[0];
                        }
                        else {
                            $active_index = $_GET['c']; 
                        }

                        for ($i=0; $i < count($list_kategory) ; $i++) { 
                          if($active_index == $list_kategory[$i]){
                            echo '<a class="item kategori active" href="?p=catalog&c='.$list_kategory[$i].'">'.$list_kategory[$i].'</a>';
                          }else{
                            echo '<a class="item kategori" href="?p=catalog&c='.$list_kategory[$i].'">'.$list_kategory[$i].'</a>';
                          }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="twelve wide column">
                <div class="title-product-section">
                   

                <section class="ui very padded segment square" id="category-lowongan">
                    <div class="content-catalog">
                        <div class="ui grid">

                          <?php 
                            $url = 'http://localhost/api/barang/v1/'.strtolower($active_index).'/index.php';

                            $data = array();

                            // use key 'http' even if you send the request to https://...
                            $options = array(
                                'http' => array(
                                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                    'method'  => 'GET',
                                    'content' => http_build_query($data)
                                )
                            );
                            $context  = stream_context_create($options);
                            $result = file_get_contents($url, false, $context);
                            if ($result === FALSE) { /* Handle error */ }

                            $userData = json_decode($result,true);
                            for($i = 0; $i < count($userData['data']); $i ++){

                          ?>

                          <div class="five wide column">
                                <div class="ui card">
                                  <div class="ui top attached label">Rp <?=$userData['data'][$i]['harga']?></div>
                                  <div class="image">
                                    <div class="ui bottom attached label"><?=$userData['data'][$i]['vendor']?> <?=$userData['data'][$i]['nama']?></div>
                                    <img src="public/images/grav.png">
                                  </div>
                                  <div class="content">
                                    <button class="ui fluid button" id="btnDetail_<?= $userData['data'][$i]['id'] ?>" onclick="

                                    <?php
                                      if($active_index == "Motherboard"){
                                    ?>
                                      detailMotherboard('<?= $userData['data'][$i]['id'] ?>','<?= $userData['data'][$i]['nama'] ?>','<?= $userData['data'][$i]['socket'] ?>','<?= $userData['data'][$i]['vendor'] ?>','<?= $userData['data'][$i]['ram'] ?>','<?= $userData['data'][$i]['ram slot'] ?>','<?= $userData['data'][$i]['pcie slot'] ?>','<?= $userData['data'][$i]['harga'] ?>','<?= $userData['data'][$i]['stok'] ?>')
                                    <?php
                                      }else if($active_index == "Processor"){
                                    ?>
                                      detailProc('<?= $userData['data'][$i]['id'] ?>','<?= $userData['data'][$i]['nama'] ?>','<?= $userData['data'][$i]['socket'] ?>','<?= $userData['data'][$i]['vendor'] ?>','<?= $userData['data'][$i]['clock speed'] ?>','<?= $userData['data'][$i]['harga'] ?>','<?= $userData['data'][$i]['stok'] ?>')
                                    <?php
                                      }else if($active_index == "Storage"){
                                    ?>
                                      detailStorage('<?= $userData['data'][$i]['id'] ?>','<?= $userData['data'][$i]['nama'] ?>','<?= $userData['data'][$i]['vendor'] ?>','<?= $userData['data'][$i]['storage type'] ?>','<?= $userData['data'][$i]['harga'] ?>','<?= $userData['data'][$i]['stok'] ?>')
                                    <?php
                                      }else if($active_index == "VGA"){
                                    ?>
                                      detailVga('<?= $userData['data'][$i]['id'] ?>','<?= $userData['data'][$i]['nama'] ?>','<?= $userData['data'][$i]['vendor'] ?>','<?= $userData['data'][$i]['memory type'] ?>','<?= $userData['data'][$i]['ram size'] ?>','<?= $userData['data'][$i]['harga'] ?>','<?= $userData['data'][$i]['stok'] ?>')
                                      <?php
                                      }else if($active_index == "PSU"){
                                    ?>
                                      detailPsu('<?= $userData['data'][$i]['id'] ?>','<?= $userData['data'][$i]['nama'] ?>','<?= $userData['data'][$i]['vendor'] ?>','<?= $userData['data'][$i]['kapasitas'] ?>','<?= $userData['data'][$i]['modular'] ?>','<?= $userData['data'][$i]['harga'] ?>','<?= $userData['data'][$i]['stok'] ?>')
                                      <?php
                                      }else if($active_index == "RAM"){
                                    ?>
                                      detailRam('<?= $userData['data'][$i]['id'] ?>','<?= $userData['data'][$i]['nama'] ?>','<?= $userData['data'][$i]['vendor'] ?>','<?= $userData['data'][$i]['kapasitas'] ?>','<?= $userData['data'][$i]['speed'] ?>','<?= $userData['data'][$i]['ram_type'] ?>','<?= $userData['data'][$i]['harga'] ?>','<?= $userData['data'][$i]['stok'] ?>')
                                      <?php
                                      }else if($active_index == "Casing"){
                                    ?>
                                      detailCasing('<?= $userData['data'][$i]['id'] ?>','<?= $userData['data'][$i]['nama'] ?>','<?= $userData['data'][$i]['vendor'] ?>','<?= $userData['data'][$i]['harga'] ?>','<?= $userData['data'][$i]['stok'] ?>')
                                    
                                    <?php
                                      }
                                    ?>            
                                    ">
                                      <i class="expand icon"></i>
                                      Detail
                                    </button>
                                  </div>
                                  <div class="extra content">
                                    <button class="ui green fluid button" id="btnBuy_<?= $userData['data'][$i]['id'] ?>" onclick="addToCart('<?= $userData['data'][$i]['jenis'] ?>', '<?= $userData['data'][$i]['id'] ?>', '<?= $userData['data'][$i]['nama'] ?>', <?= $userData['data'][$i]['harga'] ?> , 1)">
                                      <i class="add to cart icon"></i>
                                      Buy
                                    </button>
                                  </div>
                                </div>
                            </div>

                          <?php
                            }
                          ?>
                            


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
          <ul class="ui list">
            <?php
              if($active_index == "Motherboard"){

            ?>
              <li>Socket = <span id="socket"> </span></li>
              <li>Vendor = <span id="vendor"> </span></li>
              <li>Jenis Ram = <span id="jenis_ram"> </span></li>
              <li>Slot Ram = <span id="slot_ram"> </span ></li>
              <li>Slot Pcie = <span id="slot_pcie"> </span ></li>
              <li>Harga = <span id="harga">  </span></li>
              <li>Stok = <span id="stock"> </span></li>
            <?php
              }else if($active_index == "Processor"){
            
            ?>
              <li>Socket = <span id="socket"> </span></li>
              <li>Vendor = <span id="vendor"> </span></li>
              <li>Clock Speed = <span id="clock_speed"></span> MHz</li>
              <li>Harga = Rp <span id="harga">  </span></li>
              <li>Stok = <span id="stock"> </span></li>

            <?php
              }else if($active_index == "Storage"){
            
            ?>
              <li>Storage Type = <span id="storage_type"> </span></li>
              <li>Vendor = <span id="vendor"> </span></li>
              <li>Harga = Rp <span id="harga">  </span></li>
              <li>Stok = <span id="stock"> </span></li>
            <?php
              }else if($active_index == "VGA"){
            ?>
              <li>Memory Type = <span id="memory_type"> </span></li>
              <li>Memory size = <span id="memory_size"> </span> MB </li>
              <li>Vendor = <span id="vendor"> </span></li>
              <li>Harga = Rp <span id="harga">  </span></li>
              <li>Stok = <span id="stock"> </span></li>
              <?php
              }else if($active_index == "PSU"){
            ?>
              <li>Kapasitas = <span id="kapasitas"></span> WATT </li>
              <li>Modular = <span id="modular"> </span></li>
              <li>Vendor = <span id="vendor"> </span></li>
              <li>Harga = Rp <span id="harga">  </span></li>
              <li>Stok = <span id="stock"> </span></li>
              <?php
              }else if($active_index == "RAM"){
            ?>
              <li>Kapasitas = <span id="kapasitas"></span> MB </li>
              <li>Speed = <span id="speed"></span>MHz</li>
              <li>Jenis Ram = <span id="ram_type"> </span></li>
              <li>Vendor = <span id="vendor"> </span></li>
              <li>Harga = Rp <span id="harga">  </span></li>
              <li>Stok = <span id="stock"> </span></li>
              <?php
              }else if($active_index == "Casing"){
            ?>
              <li>Vendor = <span id="vendor"> </span></li>
              <li>Harga = Rp <span id="harga">  </span></li>
              <li>Stok = <span id="stock"> </span></li>
            <?php
              }
            ?>            
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
  
  function detailMotherboard(id,nama_barang,socket,vendor,jenis_ram,slot_ram,slot_pcie,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#socket').text(socket);
      $('#vendor').text(vendor);
      $('#jenis_ram').text(jenis_ram);
      $('#slot_ram').text(slot_ram);
      $('#slot_pcie').text(slot_pcie);
      $('#harga').text(harga);
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
      $('#harga').text(harga);
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
      $('#harga').text(harga);
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
      $('#harga').text(harga);
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
      $('#harga').text(harga);
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
      $('#harga').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }

   function detailCasing(id,nama_barang,vendor,harga,stock){
    // window.alert(id);

      $('#title_detail span').text(nama_barang);
      $('#vendor').text(vendor);
      $('#harga').text(harga);
      $('#stock').text(stock);

      $('#detail')
        .modal('show')
      ;
  }



</script>

</section>