<script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>
<script type="text/javascript" src="js/header.js"></script>
             <div class="ui fixed borderless menu square">
                <div class="ui container">
                    <a class="<?php if($p == 'home'){echo "active";} ?> item" href="?p=home">
                        Home
                    </a>
                    <a class="<?php if($p == 'catalog'){echo "active";} ?> item" href="?p=catalog">
                        Catalog
                    </a>       
                     
                    <div class="right item">
                        <div class="item">
                            <div class="ui input">
                                <input type="text" placeholder="Apa yang anda cari ?">
                                <button class="ui icon green button">
                                    <i class="search icon"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="item">
                            <button class="green circular ui icon button" onclick="detailcart()"><i class="shopping bag icon"></i><div class="floating ui small red circular label" id="cart_size">22</div></button>
                        </div>
                        <?php if(!empty($_SESSION['uid'])){  ?>
                         
                            <div class="item">
                                <a href="?p=account"><button class="ui basic green button" id="btnAccountHeader"><i class="grey add user icon"></i>My Account</button></a>
                            </div>

                            <div class="item">
                                <a href="?p=logout"><button class="ui basic green button" id="btnLogoutHeader"><i class="grey sign out icon"></i>Logout</button></a>
                            </div>
                        <?php }else{ ?>
                            <div class="item">
                                <a href="?p=login"><button class="ui basic green button" id="btnLoginHeader" ><i class="grey sign in icon"></i>Login</button></a>
                            </div>

                            <div class="item">
                                <a href="?p=register"><button class="ui basic green button" id="btnRegisterHeader"><i class="grey add user icon"></i>Register</button></a>
                            </div>

                        <?php } ?>
                        
                    </div>
                </div>
            </div>

