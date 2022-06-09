<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"  rel="stylesheet" />
</head>
<body>
    <?php
    if($this->session->has_userdata('error')){
        echo '<div class="alert alert-danger mb-0">'.$this->session->flashdata('error').'</div>';
    }
    if($this->session->has_userdata('success')){
        echo '<div class="alert alert-success mb-0">'.$this->session->flashdata('success').'</div>';
    }
    ?>

    <div>