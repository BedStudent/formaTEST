
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2>Forma</h2>
       <?php if(isset($_POST['submit'])):?>
        <?php validate($_POST);?>
        <?php if(sizeof($validationErrors)==0):?>
            <?php
                saveMessage($_POST);
               header('Location:http://01.22.ddev.site'); //uztikrina kad parekreshinus duomenys neadasidedu jei nepaspaudi
                ?>
                <?php else:?>
                    <ul>
                        <?php foreach($validationErrors as $Error):?>
                            <li class="alert alert-danger"><?=$Error;?></li>
                        <?php endforeach;?>
                    </ul>
            <?php endif;?>
            <?php endif;?>        
        <form method="post">
            <div class="form-group">
                <select name="company" class="form-control">
                    <option selected disabled>--Pasirinkite imone--</option>
                    <?php foreach($companies as $code => $company):?>
                    <?php if(!in_array($company,$blackList)):?>
                    <option value="<?=$company;?>"><?=$company;?></option>
                    <?php endif;?>
                <?php endforeach; ?>
                </select>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Nuoroda" name="link" class="form-control">
                </div>
                <div class="form-group">
                <select name="departments" class="form-control">
                    <option selected disabled>--Pasirinkite departamenta--</option>
                    <?php foreach($departments as $code => $department):?>
                    <option value="<?=$department;?>"><?=$department;?></option>
                <?php endforeach; ?>
            </select>
            </div>
            <div class="form-group">
                <input type="text" name="Vardas" placeholder="Vardas">
            </div>
            <div class="form-group">
                <input type="text" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <textarea name="message" placeholder="Jusu zinute"></textarea>
            </div>
            <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Rodyti</button>  
            </div>
        </form>
        <section>
            <h2>Klientu zinutes</h2>
            <table class="tabel table-bordered table striped">
                <tr>
                    <th>Imone</th>
                    <th>Departments</th>
                    <th>Vardas</th>
                    <th>El.pastas</th>
                    <th>Zinute</th>
                </tr>
                <?php foreach(getData() as $list):?>
                    <tr>
                        <?php $list = explode(',',$list);?> 
                            <?php foreach($list as $item):?>
                                <?php if(!empty($item)):?>
                                    <td><?=$item;?></td>
                                <?php endif;?>
                            <?php endforeach;?>
                    </tr>
                <?php endforeach;?>
            </table>
        </section>
      </div>
    </body>
</html>
