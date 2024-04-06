<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/massplug.png"><!--Will have to make this-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/MDB/css/mdb.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->    
    <title>Upload a Slider</title>
</head>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('upload/do_uploadslider'); //this is name of the controller followed by the method that handles form posts.?>

<div class="card">
    <div class="card-body">    

    <div class="card-header"><p class="h4 text-center mb-4">Slider Upload</p></div>

    <label for="" class="grey-text">Article Title</label>
    <input type="input" id="" class="form-control" name="title" required>

    <br>

    <label for="" class="grey-text">Category</label>
    <select name="category">
        <option value="Music">Music</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Fashion">Fashion</option>
        <option value="Photography">Photography</option>
    </select>

    <br>

    <label for="" class="grey-text">Editor</label>
    <input type="input" id="" class="form-control" name="editor" required>

    <br>

    <label for="" class="grey-text">Reader Hook</label>
    <input type="input" id="" class="form-control" name="hooker" required>

    <br>

    <label for="" class="grey-text">Article</label>
    <textarea type="input" id="" class="form-control" name="article" required></textarea>

    <br>

    <label for="Media File">Media File</label>
    <input type="file" name="data_file" accept="image/*"  required/><br />

    <div class="text-center mt-4">
        <button class="btn btn-indigo" name="submit" type="submit">Upload</button>
    </div>
</form>
</div>
</div>


