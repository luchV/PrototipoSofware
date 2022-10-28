<div class="row">
    <div class="col-md-12">
        <label class="control-label"><?= $textoBusqueda ?></label>
    </div>
</div>
<div class="form-group col-lg-4 col-sm-5 col-12" style="padding-left: 0px;text-align: initial;">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <em class="fa fa-search"></em>
            </div>
        </div>
        <input type="text" value="<?= $valorInput ?>" class="form-control" placeholder="Ingresar cédula" id="<?= $idInput ?>" name="<?= $nameInput ?>" minlength="<?= $longitudMinimaInput ?>" maxlength="<?= $longitudMaximaInput ?>">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit" name="<?= $nameButton ?>">
                <em class="fa fa-search text-white"></em> <?= $textoBoton ?>
            </button>
        </span>
    </div>
</div>