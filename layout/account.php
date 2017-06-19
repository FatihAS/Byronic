<!-- Kategori & List barang -->
<br>
<section class="category-top-section">
    <div class="ui container">
        <div class="ui stackable grid">


                <div class="twelve wide column">
                    <div class="title-product-section">

                        <section class="ui very padded segment square">
                            <div class="ui container">
                                <div class="ui divided items">
                                    

                                  <div class="item">
                                    <div class="content">
                                      <a class="header">User Account</a>
                                      <div class="meta">
                                        <span class="cinema"><i class="mail icon"></i><?= $_SESSION['user_email'] ?></span>
                                      </div>
                                      
                                  </div>

                                </div>

                                <div class="ui divider" ></div>

                                      <div class="description"><h3>Pesanan Dipending</h3>
                                      <table class="ui green sortable celled table">
                                        <thead>
                                          <th>NO</th>
                                          <th>Kode Pesanan</th>
                                          <th></th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $url = 'https://api.gravicodev.id/transaction/v1/pesanan/index.php?id_user='.$_SESSION["uid"].'&status=0';

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

                                              <tr>
                                                
                                                <td>
                                                  <?= $i+1 ?>  
                                                </td>
                                                <td>
                                                  <?=$userData["data"][$i]["id"]?>
                                                </td>
                                                <td>
                                                  <button class="ui fluid button" onclick='detailPesanan(<?=$userData["data"][$i]["json_pesanan"]?>)'> Detail</button>
                                                </td>
                                              <?php
                                              $json_pesanan = $userData['data'][$i]["json_pesanan"];
                                              $pesanan = json_decode($json_pesanan, true);
                                              ?>
                                                </tr>
                                              <?php
                                            }

                                              ?>
                                              </tbody>
                                              </table>                                  
                                    </div>

                            </div>
                        </section>

                        
                        <section class="ui very padded segment square">
                        
                        <div class="ui divider" ></div>
                             <div class="description"><h3>Histori Pesanan</h3>
                                http://localhost/api/transaction/v1/pesanan/index.php?id_user=1
                              
                            </div>
                        </section>

                    </div>
                </div>
                

            <div class="four wide column">
                <div class="category-section">
                  <button class="ui fluid green active button" onclick="edit()">
                    <i class="setting icon"></i>
                    Edit Profile
                  </button> 
                    <div class="ui menu square" id="category-lowongan">

                        <div class="ui card">
                          <div class="content">
                            PESAN
                          </div>
          
                          <div class="content">
                            <i class="check circle icon"></i>
                            Job Yang Terpasang : 2
                          </div>
                          
                        </div>
                        
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>







<script type="text/javascript">
  function detailPesanan(pesanan){
    window.alert(pesanan);
  }

</script>
