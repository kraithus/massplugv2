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
    <title>Update a Main Article</title>
</head>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('upload/do_editmain'); //this is name of the controller followed by the method that handles form posts.?>

<div class="card">
    <div class="card-body">    

    <div class="card-header"><p class="h4 text-center mb-4">Update a Main Article</p></div>

    <label for="" class="grey-text">Article Title</label>
    <textarea type="input" id="" class="form-control" name="title" required><?php echo $main_item['title']?></textarea>

    <br>

    <label for="" class="grey-text">Category</label>
    <select name="category">
        <option value="<?php echo $main_item['category']?>"><?php echo $main_item['category']?></option>
        <option value="Music">Music</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Fashion">Fashion</option>
        <option value="Fashion">Lifestyle</option>
        <option value="Technology">Technology</option>
    </select>

    <br>

    <label for="" class="grey-text">Editor</label>
    <textarea type="input" id="" class="form-control" name="editor" required><?php echo $main_item['editor']?></textarea>

    <br>

    <label for="" class="grey-text">Reader Hook</label>
    <textarea type="input" id="" class="form-control" name="hooker" required><?php echo $main_item['hooker']?></textarea>

    <br>

    <label for="" class="grey-text">Article</label>
    <textarea type="input" id="" class="form-control" name="article" required><?php echo $main_item['article']?></textarea>

    <br>

    <input type="hidden" name="id" value="<?php echo $main_item['id']?>">

    <div class="text-center mt-4">
        <button class="btn btn-indigo" name="submit" type="submit">UPDATE</button>
    </div>
</form>
</div>
</div>


