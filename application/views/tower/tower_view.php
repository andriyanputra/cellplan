<script type="text/javascript" src="<?php echo base_url() ?>static/js_poly_tower.js"></script>
<script type="text/javascript">
      var script = '<script type="text/javascript" src="<?php echo base_url()?>static/markerclusterer';
      if (document.location.search.indexOf('compiled') !== -1) {
        script += '_compiled';
      }
      script += '.js"><' + '/script>';
      document.write(script);
</script>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" id="site_url" value="<?php echo site_url(); ?>" />      


        <div id="map_canvas" style="width:100%; height:500px;border-radius: 5px 5px 5px 5px;"></div>
        </div>
</div>    
