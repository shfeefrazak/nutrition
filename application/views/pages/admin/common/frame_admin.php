<html>
    <head>
     <?= $import_top; ?>
        <?= $import_top_custom; ?>
    </head>
    <body class="hold-transition skin-yellow sidebar-mini" >
        <div  id = "top" class="wrapper">
        
        <header class="main-header" id="header">
     <?= $header; ?>
  </header>
        
        <aside class="main-sidebar" >
    <?= $sidebar; ?>
  </aside>
        
        
        
        <div class="content-wrapper">
  
    <?= $content; ?>
  
	  
    
    <!-- /.content -->
  </div>
        
        
        
        
        
        
        <section id="footer">
             <?= $footer; ?>
        </section>
        
        <?= $import_bottom; ?>
        <?= $import_botton_custom; ?>
        </div>
    </body>
    
</html>