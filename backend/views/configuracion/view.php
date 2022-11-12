<?php

use common\helpers\FuncionesGenerales;
use common\models\Params;
use common\models\Respuestas;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\ContenedorTablas;
use common\widgets\BotonActualizarEliminar;


/* @var $this yii\web\View */

$this->title = $modelID->modNombre . ' : Actividad ' . $model->secNumeroPregunta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuración de módulos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuración de actividad'), 'url' => ['update', 'id' => $modelID->modCodigo]];
$this->params['breadcrumbs'][] = $this->title;
if ($model->secEstado == Params::ESTADOINACTIVO) {
    $botonDesactivar = false;
}
?>
<div class="configuracion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= BotonActualizarEliminar::widget([
        'editarBoton' => true,
        'accionActualizar' => 'update-pregunta',
        'desactivarBoton' => $botonDesactivar ?? true,
        'accionDesactivar' => 'disabled',
        'mensajeMuestraDesactivar' => 'Está seguro que desea desactivar',
        'idBoton' => (string)$model->secCodigo,
        'mensajeNombre' => $this->title,
        'controller' => 'configuracion',
    ]); ?>

    <div class="alert alert-danger" name='error' id="error" role="alert" style="display: none;"></div>
    <?php ContenedorTablas::begin();  ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'secNumeroPregunta',
                'value' => function ($model) {
                    return FuncionesGenerales::TiposActividades()[$model->secNumeroPregunta];
                }
            ],
            [
                'attribute' => 'secTipoRespuesta',
                'value' => function ($model) {
                    return FuncionesGenerales::TiposPreguntas()[$model->secTipoRespuesta];
                },
            ],
            [
                'attribute' => 'secEstado',
                'value' => function ($model) {
                    return FuncionesGenerales::TiposEstados()[$model->secEstado];
                },
            ],
            'secPregunta',
            [
                'attribute' => 'seccAudioPregunta',
                'label' => 'Audio de la orden principal',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<audio controls>
                                <source src="https://docs.google.com/uc?export=open&id=' .  $model->seccAudioPregunta . '" type="audio/mp3">
                            </audio>';
                },
            ],
            'seccSubpregunta',
            [
                'attribute' => 'seccAudioSubPregunta',
                'label' => 'Audio de la orden secundaria',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<audio controls>
                                <source src="https://docs.google.com/uc?export=open&id=' .  $model->seccAudioSubPregunta . '" type="audio/mp3">
                            </audio>';
                },
            ],
            [
                'attribute' => 'secCodigo',
                'label' => 'Respuestas',
                'format' => 'raw',
                'value' => function ($model) {
                    $respuestasMostrar = "";
                    $respuestas = Respuestas::find()->where(['secCodigo' => $model->secCodigo])->orderBy('resNumero')->all();
                    foreach ($respuestas as $value) {
                        $respuestasMostrar .= "<strong>" . "Respuesta " . $value['resNumero'] . "<br/></strong>";
                        $respuestasMostrar .= 'Tipo de respuesta: ' . FuncionesGenerales::TiposRespuestas()[$value['respuestaCorrecto']] . '<br/>'  .
                            'Respuesta en Texto: ' . $value['respuestaTexto'] .  '<br/>' .
                            'Imagen: <img src="https://drive.google.com/uc?export=view&id=' . $value['imagen'] . '" height="151px" width="151px" hspace="25"><br/>';
                    }
                    return $respuestasMostrar;
                },
            ],
        ],
    ]) ?>
    <?php ContenedorTablas::end();  ?>

</div>