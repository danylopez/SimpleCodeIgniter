<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Playlist Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Load style for Bootstrap  -->
    <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<!-- Load Jquery -->
    <script src=" <?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- Load JS for Bootstrap -->
    <script src=" <?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<div id="container">
    <div class="container">
        <!-- Row for tittle -->
        <div class="page-header" style="margin-top: 0px;">
                <h1 clas="center"><dt>Playlist Manager - <?php echo $playlist[0]->name;?> (Viendo)</dt></h1>
        </div>
        <!-- Row for table -->
        <div class="row">
            <div class="col-md-4 col-sm-4 ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Videos</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($videos)) { ?>
                        <tr><td><?php echo "No hay videos." ?></td></tr>
                    <?php } else {  ?>
                    <?php  foreach($videos as $object) { ?>
                        <tr>
                            <td>
                                <a href="<?php echo site_url("controller_video/load_play/{$object->id_video}"); ?>" class="btn btn-link center"><?php echo $object->name ?></a>
                            </td>
                        </tr>
                    <?php  } ?>
                    <?php }  ?>
                    </tbody>
                </table>
            </div>
            <!-- Jumbtron for save new playlist -->
            <div class="col-md-8 col-sm-8">
                <div class="embed-responsive embed-responsive-16by9 ">
                    <?php if(!empty($videos)) { ?>
                        <iframe class="embed-responsive-item" src="<?php echo $videos[0]->url;?>" frameborder="0" allowfullscreen></iframe>
                    <?php }  ?>
                </div>
                <br/>
                <a href="<?php echo site_url("Controller_playlist/index"); ?>" class="btn btn-primary text-right">Regresar</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>