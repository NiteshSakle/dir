<!DOCTYPE html>
<html>
    <head>
        <title>KHTPS-ELIBRARY</title>
        <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>/img/favicon.jpg">

        <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style1.css">

        <!-- SCRIPTS -->
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/ajax_googleapi.js"></script>     
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/directorylister.js"></script>
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/js_elibrary.js"></script>

        <!-- STYLES -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <!-- FONTS -->
        <link rel="stylesheet" type="text/css"  href="//fonts.googleapis.com/css?family=Cutive+Mono">

        <!-- META -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <?php file_exists('analytics.inc') ? include('analytics.inc') : false; ?>
    </head>

    <body>

        <!-- Modal -->
        <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" 
                                data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Folder Details
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label  class="col-sm-3 control-label"
                                        for="inputEmail3">Folder Name</label>

                                <div class="col-sm-9">
                                    <br>
                                    <input type="text" class="form-control" 
                                           id="directory" placeholder="Folder Name" required/>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">
                            Close
                        </button>
                        <button onclick="getDirName()" type="button" class="btn btn-primary" data-dismiss="modal">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
      
        <div id="page-navbar" class="navbar navbar-default navbar-fixed-top">
            <span style="text-align: center;">
                <h2 style="background-color: #337ab7;margin-top: 0px;padding: 15px;color: white;font-family: cursive">Khaperkheda Thermal Power Station: E-library</h2>
            </span>
            <div class="container">
                <?php $breadcrumbs = $lister->listBreadcrumbs(); ?>

                <p class="navbar-text">
                    <?php foreach ($breadcrumbs as $breadcrumb): ?>
                        <?php if ($breadcrumb != end($breadcrumbs)): ?>
                    <a href="<?php echo $breadcrumb['link']; ?>"><?php echo $breadcrumb['text']; ?></a>
                            <span class="divider">/</span>
                        <?php else: ?>
                            <?php echo $breadcrumb['text']; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </p>

                <div class="navbar-right">
                    <a href="logout.php" class="btn btn-info btn-lg">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </div>
            </div>
        </div>
        <?php if($_SESSION['privilege']) {?>
            <div>
                <button class="btn btn-primary btn-lg " data-toggle="modal" data-target="#myModalHorizontal" style="float: left">
                    Create A Folder Here
                </button>
                <form action="./resources/themes/bootstrap/upload_file.php" method="post" enctype="multipart/form-data" style="float: right;width: 38%">               
                    Select file to upload:
                    <input type="file" name="file" id="file">
                    <input type="submit" value="Upload" name="submit" class="btn btn-default">
                    <input type="text" name="dir" id="dir" value="/<?php echo $lister->getDirectoryPath(); ?>" style="visibility:hidden"/>                             
                </form>             
            </div>        
        <?php } ?>

            <?php file_exists('header.php') ? include('header.php') : include($lister->getThemePath(true) . "/default_header.php"); ?>
            <?php if ($lister->getSystemMessages()): ?>
                <?php foreach ($lister->getSystemMessages() as $message): ?>
                    <div class="alert alert-<?php echo $message['type']; ?>">
                        <?php echo $message['text']; ?>
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <div id="page-content" class="container">

            <div id="directory-list-header">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-10">File</div>
                    <div class="col-md-2 col-sm-2 col-xs-2 text-right">Size</div>
                    <div class="col-md-4 col-sm-4 hidden-xs text-right">Last Modified</div>
                </div>
                    <hr style="border: 0;background-color: black;height:1px;">                
            </div>

            <ul id="directory-listing" class="nav nav-pills nav-stacked">

                <?php foreach ($dirArray as $name => $fileInfo): ?>
                    <li data-name="<?php echo $name; ?>" data-href="<?php echo $fileInfo['url_path']; ?>" data-link="<?php echo $lister->getDirectoryPath(); ?>">
                        <a href="<?php echo $fileInfo['url_path']; ?>" class="clearfix" data-name="<?php echo $name; ?>" target="<?php if (is_file($fileInfo['file_path'])) echo "_blank"; else echo "_self"?>">

                            <div class="row">
                                <span class="file-name col-md-6 col-sm-6 col-xs-9">
                                        <i class="fa <?php if( $fileInfo['icon_class'] == 'fa-folder') echo 'fa-book'; else { echo $fileInfo['icon_class'];}  ?> fa-fw"></i>                                 
                                    <b> <span style="color: blue;font-size: 20px"><?php echo $name; ?> </span></b>
                                </span>

                                <span class="file-size col-md-2 col-sm-2 col-xs-3 text-right">
                                    <b><span style="color: blue;font-size: 18px"><?php echo $fileInfo['file_size']; ?></span></b>
                                </span>

                                <span class="file-modified col-md4 col-sm-4 hidden-xs text-right">
                                    <b><span style="color: blue;font-size: 17px"><?php echo $fileInfo['mod_time']; ?> </span></b>
                                </span>
                                </div>

                        </a>
                         <?php if($_SESSION['privilege']) {?>
                        <a class="file-info-button" data-toggle="modal" data-target="#deleteModal">
                            <i class="fa fa-trash"></i>
                        </a>
                         <?php } ?>
                    </li>
                    <hr style="border: 0;background-color: black;height:1px; ">
                <?php endforeach; ?>

            </ul>
        </div>
        
        <?php  file_exists('footer.php') ? include('footer.php') : include($lister->getThemePath(true) . "/default_footer.php"); ?>

        <script>
            function createDir(dirName) {
                var ajaxurl = './resources/themes/bootstrap/createDir.php';
                var dir1 = "/<?php echo $lister->getDirectoryPath(); ?>";                
                data = {'dir': dir1, 'name': dirName};
                $.post(ajaxurl, data, function (data, status) {
                    //alert("Data: " + data + "\nStatus: " + status);
                    window.location.reload(true);
                });
            }
            ;

            function getDirName() {
                var dirName = $('#directory').val();
                if (dirName === '') {
                    alert("please enter direcory name");
                } else {
                    createDir(dirName);
                }
            }
            function uploadFile() {
                window.location.assign("./resources/themes/bootstrap/upload_file.php");
            }
            
        </script>
    </body>

</html>
