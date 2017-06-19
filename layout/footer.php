<script type="text/javascript" src="js/footer.js"></script>
        <div class="ui inverted vertical segment">
                <div class="ui center aligned container">
                    <div class="footer-section">
                        <div class="ui stackable equal height stackable grid">
                            <div class="four wide column">
                                <h4 class="ui header2">BYRONIC</h4>
                                <div class="ui divider"></div>
                                <div class="ui link list">
                                    <a href="#" class="item ">Home</a>
                                    <a href="#" class="item">Catalog</a>
                                </div>
                            </div>
                            <div class="four wide column">
                                <h4 class="ui header2">Company</h4>
                                <div class="ui divider"></div>
                                <div class="ui link list">
                                    <a href="#" class="item">Tentang Kami
                                </div>
                            </div>
                            <div class="four wide column">
                                <h4 class="ui header2">Resource</h4>
                                <div class="ui divider"></div>
                                <div class="ui link list">
                                    <a href="#" class="item">Kebijakan Privasi</a>
                                    <a href="#" class="item">Syarat dan Ketentuan</a>
                                    <a href="#" class="item">Panduan Pembelian</a>
                                </div>
                            </div>
                            <div class="four wide column">
                                <h4 class="ui header2">Social Media</h4>
                                <div class="ui divider"></div>
                                <div class="ui link list">
                                    <a href="#" class="item"><i class="green facebook icon"></i> facebook</a>
                                    <a href="#" class="item"><i class="green instagram icon"></i> instagram</a>
                                    <a href="#" class="item"><i class="green google plus icon"></i> Google Plus</a>
                                </div>
                            </div>
                        </div>
                        <div class="ui inverted section divider"></div>
                        <div class="ui horizontal inverted small divided link list">
                            <a class="item">@2017 Hak Cipta Terpelihara PT. BYRONiC</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="ui modal" id="cart">
                <div class="header" id="title_cart">
                  <span class="center aligned">CART</span>
                </div>
                <div class="content"><h1 class="ui center aligned header" id="cart_kosong">CART ANDA KOSONG</h1></div>
                <div class="ui container" id="table_container">
                </div>
                <div class="actions">
                    <div class="ui black deny lebeled icon button">
                      <i class="remove icon"></i>
                      Close
                    </div>
                    <div class="ui positive right labeled icon button">
                        <i class="checkmark icon"></i>
                        Checkout
                    </div>
                </div>
              </div>

              <div class="ui basic modal" id="warning">
                  <div class="ui icon header">
                    <i class="add to cart icon"></i>
                        Add <span id="nama_barang_modal"></span> ?
                  </div>
                  <div class="content">
                    <p>Yakin menambahkan item ini ke keranjang belanja anda ? </p>
                  </div>
                  <div class="actions">
                    <div class="ui red basic cancel inverted button">
                      <i class="remove icon"></i>
                      No
                    </div>
                    <div class="ui green ok inverted button" onclick="yaWarning()">
                      <i class="checkmark icon"></i>
                      Yes
                    </div>
                  </div>
                </div>
              <script type="text/javascript">
                var cart;
                if(getCookie("cart") != ""){
                    cart = JSON.parse(getCookie("cart"));
                }else{
                    cart = [];
                }
                var id_cart_helper = [];
                var gjenis = "jenis";
                var gid_barang = "id_barang";
                var gnama_barang = "nama_barang";
                var gharga_satuan = 0;
                var gjumlah_barang = 0;
                var rendered = 0;

                var cart_column_member = ["nama_barang","harga_satuan","jumlah_barang"];

                cartLabelRefresh();

                function addToCart(jenis, id_barang, nama_barang, harga_satuan, jumlah_barang){
                    $('#nama_barang_modal').html(nama_barang);
                    $('#warning')
                            .modal('show');
                    gjenis = jenis;
                    gid_barang = id_barang;
                    gnama_barang = nama_barang;
                    gharga_satuan = harga_satuan;
                    gjumlah_barang = jumlah_barang;
                }

                function yaWarning(){
                    addItem(gjenis, gid_barang, gnama_barang, gharga_satuan, gjumlah_barang)
                }

                  function detailcart(){

                        $("#body_cart").empty();

                        for(var i = 0; i < cart.length; i++){
                            id_cart_helper.push(i);
                            var toAdd = document.createElement('tr');
                            var newCol = document.createElement('td');
                            newCol.id = "nomor"+i;
                            newCol.innerHTML = i+1;
                            toAdd.appendChild(newCol);
                            var newCol = document.createElement('td');
                            newCol.id = "nama_barang"+i;
                            newCol.innerHTML = cart[i]["nama_barang"];
                            toAdd.appendChild(newCol);
                            var newCol = document.createElement('td');
                            newCol.id = "harga_satuan"+i;
                            newCol.innerHTML = cart[i]["harga_satuan"];
                            toAdd.appendChild(newCol);
                            var newCol = document.createElement('td');
                            newCol.id = "jumlah_barang"+i;
                            newCol.innerHTML = cart[i]["jumlah_barang"];
                            toAdd.appendChild(newCol);
                            var newCol = document.createElement('td');
                            newCol.id = "harga_total"+i;
                            newCol.innerHTML = cart[i]["harga_satuan"] * cart[i]["jumlah_barang"] ;
                            toAdd.appendChild(newCol);
                            var newCol = document.createElement('td');
                            newCol.id = "action"+i;
                            newCol.innerHTML = '<button class="circular ui icon button" onclick="delItem(\''+ i +'\',\''+ cart[i]["jenis"] +'\', \''+ cart[i]["id_barang"] +'\')"><i class="icon minus"></i></button><button class="circular ui icon button" onclick="addItemFromCart(\''+ i +'\',\''+ cart[i]["jenis"] +'\', \''+ cart[i]["id_barang"] +'\')"><i class="icon plus"></i></button><button class="circular ui icon button" onclick="delItemFromCart(\''+ i +'\',\''+ cart[i]["jenis"] +'\', \''+ cart[i]["id_barang"] +'\')"><i class="icon trash"></i></button>';
                            toAdd.appendChild(newCol);
                            document.getElementById('body_cart').appendChild(toAdd);
                        }

                        $('#cart')
                            .modal('show')
                        ;
                  }

                  function addItem(jenis, id_barang, nama_barang, harga_satuan, jumlah_barang){

                    var append = true;
                    for(var i = 0; i < cart.length; i++){
                        if(cart[i]["jenis"] == jenis && cart[i]["id_barang"] == id_barang){
                            cart[i]["jumlah_barang"] = cart[i]["jumlah_barang"] + 1;                            
                            append = false;
                            cartLabelRefresh();
                            break;
                        }
                    }

                    if(append){
                        var temp_array = {"jenis":jenis,"id_barang":id_barang,"nama_barang":nama_barang,"harga_satuan":harga_satuan,"jumlah_barang":jumlah_barang};
                        cart.push(temp_array);
                        cartLabelRefresh();
                    }
                  }

                function delItem(id, jenis, id_barang){
                    for(var i = 0; i < cart.length; i++){
                        if(cart[i]["jenis"] == jenis && cart[i]["id_barang"] == id_barang){
                            cart[i]["jumlah_barang"] = cart[i]["jumlah_barang"] - 1;
                            cartLabelRefresh();
                            if(cart[i]["jumlah_barang"] <= 0){
                                cart.splice(i, 1);
                                id_cart_helper.splice(i,1);
                                removeColumn(id,i);
                            }else{
                                $("#jumlah_barang"+id).html(cart[i]["jumlah_barang"]+"");
                                $("#harga_total"+id).html((cart[i]["jumlah_barang"]*cart[i]["harga_satuan"])+"");
                            }
                            break;
                        }
                    }
                }

                function delItemFromCart(id,jenis,id_barang){
                    for(var i = 0; i < cart.length; i++){
                        if(cart[i]["jenis"] == jenis && cart[i]["id_barang"] == id_barang){
                            cart.splice(i, 1);
                            id_cart_helper.splice(i,1);
                            removeColumn(id,i);
                            cartLabelRefresh();
                            break;
                        }
                    }
                }

                function addItemFromCart(id,jenis,id_barang){
                    for(var i = 0; i < cart.length; i++){
                        if(cart[i]["jenis"] == jenis && cart[i]["id_barang"] == id_barang){
                            cart[i]["jumlah_barang"] = cart[i]["jumlah_barang"] + 1;
                            cartLabelRefresh();
                            $("#jumlah_barang"+id).html(cart[i]["jumlah_barang"]+"");
                            $("#harga_total"+id).html((cart[i]["jumlah_barang"]*cart[i]["harga_satuan"])+"");
                            break;
                        }
                    }
                }

                function removeColumn(id){
                    $("#nomor"+id).remove();
                    $("#nama_barang"+id).remove();
                    $("#harga_satuan"+id).remove();
                    $("#jumlah_barang"+id).remove();
                    $("#harga_total"+id).remove();
                    $("#action"+id).remove();

                    for(var i = 0; i < id_cart_helper.length; i++){
                        $("#nomor"+id_cart_helper[i]).html(""+(i+1));
                    }
                }

                  function cartLabelRefresh(){                  
                    var empty_cart;
                    if(cart.length == 0){
                        empty_cart = true;
                    }
                    else{
                        empty_cart = false;
                    }
                    if(empty_cart == false && rendered == 0){
                        $("#cart_size").addClass("floating");
                        $("#cart_size").addClass("ui");
                        $("#cart_size").addClass("small");
                        $("#cart_size").addClass("red");
                        $("#cart_size").addClass("circular");
                        $("#cart_size").addClass("label");
                        $("#cart_kosong").html("");
                        var newTable = document.createElement('table');
                        newTable.className = "ui green sortable celled table";
                        newTable.id = "table_cart"
                        
                        var newHead = document.createElement('thead');

                        var columnHead = ["No","Nama Barang","Harga Satuan","Jumlah Barang","Harga Total", " "];

                        for(var i = 0; i < columnHead.length; i++){
                            var newTh = document.createElement("th")
                            newTh.innerHTML = columnHead[i];
                            newHead.appendChild(newTh);
                        }

                        var newBody = document.createElement("tbody");
                        newBody.id = "body_cart";

                        newTable.appendChild(newHead);
                        newTable.appendChild(newBody);
                        document.getElementById("table_container").appendChild(newTable);

                        var newObj = document.createElement('div');
                        var newH1 = document.createElement('h1');

                        newH1.className = "ui center aligned header";
                        newH1.innerHTML = "<span id='jumlah_belanja'></span>";
                        newObj.className = "content";

                        document.getElementById("table_container").appendChild(newObj);

                        newObj.appendChild(newH1);

                        rendered = 1;
                    }
                    var cart_size = 0;
                    var jumlah_belanja = 0;
                    setCookie("cart",JSON.stringify(cart),1);

                    for(var i = 0; i < cart.length; i++){
                        cart_size += cart[i]["jumlah_barang"];
                        jumlah_belanja += cart[i]["jumlah_barang"] * cart[i]["harga_satuan"];
                    }
                    if(cart_size == 0){
                        $("#cart_size").empty();
                        $("#cart_size").removeClass("floating");
                        $("#cart_size").removeClass("ui");
                        $("#cart_size").removeClass("small");
                        $("#cart_size").removeClass("red");
                        $("#cart_size").removeClass("circular");
                        $("#cart_size").removeClass("label");
                        $("#jumlah_belanja").html("");
                        $("#table_container").empty();
                        $("#cart_kosong").html("CART ANDA KOSONG");

                        rendered = 0;
                    }else{
                        $("#cart_size").html(""+cart_size);
                        $("#jumlah_belanja").html("Total Belanja ="+jumlah_belanja);
                    }
                  }

                Array.prototype.contains = function(obj) {
                    var i = this.length;
                    while (i--) {
                        if (this[i] === obj) {
                            return true;
                        }
                    }
                    return false;
                }

                function setCookie(cname, cvalue, exdays) {
                    var d = new Date();
                    d.setTime(d.getTime() + (exdays*24*60*60*1000));
                    var expires = "expires="+ d.toUTCString();
                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }

                function delCookie(cname) {
                    var d = new Date();
                    var expires = "expires=Thu, 01 Jan 1970 00:00:00 UTC";
                    document.cookie = cname + "=;" + expires + ";path=/";
                }

                function getCookie(cname) {
                    var name = cname + "=";
                    var decodedCookie = decodeURIComponent(document.cookie);
                    var ca = decodedCookie.split(';');
                    for(var i = 0; i <ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return "";
                }

              </script>
