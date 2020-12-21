
<section class="content-header">
      <h1>
        Error
        <small></small>
      </h1>
      <ol class="breadcrumb">
        
        <li class="active">Error</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="body_view">
        
        
        <div class="col-md-12 callout callout-danger">
            <h4>
                <?php
                $message = 'Error';
                        if(isset($data['error'])){
                            $message = $data['error'];
                        }
                        echo $message;
                ?>
                
            </h4>

                
        </div>
        
        
        
        
    </section>