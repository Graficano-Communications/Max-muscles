<h3 style="padding-top: 2%"><i class="fa fa-align-justify"></i> Menu</h3>
 
            <div class="panel-group"  id="accordion">
             
              
              <!-- Banners -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span>Banners <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr><td><a href="{{route('banners.create')}}">Add new</a></td></tr>
                                <tr><td><a href="{{route('banners.index')}}">View All</a></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

               <!-- Categories -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span>Categories <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr><td><a href="{{route('categories.create')}}">Add New</a></td></tr>
                                <tr><td><a href="{{route('categories.index')}}">View All</a></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Csr -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseseven"><span class="glyphicon glyphicon-th">
                            </span>Csr <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapseseven" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr><td><a href="{{route('csr.create')}}">Add New</a></td></tr>
                                <tr><td><a href="{{route('csr.index')}}">View All</a></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Products -->
             <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix"><span class="glyphicon glyphicon-file">
                            </span>Products <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapsesix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr><td><a href="{{route('products.create')}}">Add New</a></td></tr>
                                <tr><td><a href="{{route('products.index')}}">View All</a></td></tr>
                                <tr><td><a href="{{route('importexport')}}">Export Products</a></td></tr>
                            </table>
                        </div>
                    </div>
              </div>

               <!-- Events -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Events <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{route('events.create')}}">Add New</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('events.index')}}">View All</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            
                
                <!-- Catlogues -->
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsecs"><span class="glyphicon glyphicon-user">
                            </span> Catalogues <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapsecs" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{route('catlogs.create')}}">Add New</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('catlogs.index')}}">View All</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                 <!-- images -->
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapimg"><span class="glyphicon glyphicon-user">
                            </span> Images <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapimg" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{route('image.create')}}">Add New</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('image.index')}}">View All</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                 <!-- videos -->
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsvideo"><span class="glyphicon glyphicon-user">
                            </span> Videos <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapsvideo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{route('video.create')}}">Add New</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('video.index')}}">View All</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- departments -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsdept"><span class="glyphicon glyphicon-user">
                            </span> Departments <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapsdept" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{route('department.create')}}">Add New</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('department.index')}}">View All</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- blogs -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsblog"><span class="glyphicon glyphicon-user">
                            </span> Blogs <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapsblog" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{route('blog.create')}}">Add New</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('blog.index')}}">View All</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- Our Team -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsourteam"><span class="glyphicon glyphicon-user">
                            </span> Our Team <i class="fa fa-caret-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapsourteam" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{route('ourteam.create')}}">Add New</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('ourteam.index')}}">View All</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
 

 