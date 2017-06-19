<!-- banner -->
    <div class="banner-section2">
                <!-- <img src="public/images/banner-2.jpg"> -->
        <div class="banner-section">
            <section class="ui segment banner slider square" id="banner">
                <div><img class="center-cropped" src="public/images/banner-1.jpg"></div>
                <div><img class="center-cropped" src="public/images/banner-2.jpg"></div>
                <div><img class="center-cropped" src="public/images/banner-3.jpg"></div>
                <div><img class="center-cropped" src="public/images/banner-4.jpg"></div>
            </section>
            
        </div>
    </div>

<!-- kenapa menggunakan --> 

    <div class="custom-section">
        <div class="popular-product">
            
                    <div class="ui text container">
                            <div class="ui center aligned header">Popular Product</div>
                    </div>
                    <div class="ui divider"></div>
                        <div class="ui pointing menu">
                        <?php 
                        $list_kategory = ['Motherboard', 'Processor', 'Storage', 'VGA', 'PSU', 'RAM','Casing'];

                         if(empty($_GET['c'])){
                            $active_index = $list_kategory[0];
                        }
                        else {
                            $active_index = $_GET['c']; 
                        }

                        for($i = 0; $i < sizeof($list_kategory); $i++){ 
                            if($active_index == $list_kategory[$i]){
                            ?>
                            <a class="active item" href="?p=home&c=<?= $list_kategory[$i] ?>">
                              <?= $list_kategory[$i] ?>
                            </a>
                            <?php
                            }
                            else{
                            ?>
                            <a class="item" href="?p=home&c=<?= $list_kategory[$i] ?>">
                              <?= $list_kategory[$i] ?>
                            </a>
                            <?php
                            }
                        }
                        ?>
                        </div>
                        <div class="ui segment">
                          <div class="ui grid">
                              <div class="row">
                                <div class="three wide column">
                                    <h5>PowerColor Radeon RX 460</h5>
                                </div>
                                <div class="ten wide column">
                                    <div class="ui progress">
                                      <div class="bar" style="width: 60%"></div>
                                    </div>
                                </div>
                                <div class="three wide column">
                                    <button class="ui fluid green button">Use It</button>
                                </div>
                              </div>

                            <div class="row">
                                <div class="three wide column">
                                    <h5>PowerColor Radeon RX 460</h5>
                                </div>
                                <div class="ten wide column">
                                    <div class="ui progress">
                                      <div class="bar" style="width: 40%"></div>
                                    </div>
                                </div>
                                <div class="three wide column">
                                    <button class="ui fluid green button">Use It</button>
                                </div>
                              </div>

                            <div class="row">
                                <div class="three wide column">
                                    <h5>PowerColor Radeon RX 460</h5>
                                </div>
                                <div class="ten wide column">
                                    <div class="ui progress">
                                      <div class="bar" style="width: 80%"></div>
                                    </div>
                                </div>
                                <div class="three wide column">
                                    <button class="ui fluid green button">Use It</button>
                                </div>
                              </div>

                            <div class="row">
                                <div class="three wide column">
                                    <h5>PowerColor Radeon RX 460</h5>
                                </div>
                                <div class="ten wide column">
                                    <div class="ui progress">
                                      <div class="bar" style="width: 30%"></div>
                                    </div>
                                </div>
                                <div class="three wide column">
                                    <button class="ui fluid green button">Use It</button>
                                </div>
                              </div>

                            

                            <div class="row">
                                <div class="three wide column">
                                    <h5>PowerColor Radeon RX 460</h5>
                                </div>
                                <div class="ten wide column">
                                    <div class="ui progress">
                                      <div class="bar" style="width: 30%"></div>
                                    </div>
                                </div>
                                <div class="three wide column">
                                    <button class="ui fluid green button">Use It</button>
                                </div>
                              </div>
                              </div>

                            </div>

                        </div>


      
        </div>
    </div>

    <form id="login_helper" method="post" >
      <input type="text" name="uid" id="uid" hidden>
    </form>