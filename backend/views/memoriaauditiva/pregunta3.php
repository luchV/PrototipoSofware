<?php

use common\widgets\BotonesCRC;
use common\widgets\BotonSiguiente;
use common\widgets\CampoAudio;
use common\widgets\CamposImagenes;
use common\widgets\CampoVoz;
use common\widgets\IntentaloNuevamente;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MenusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $modelModulo->modNombre;
$this->params['breadcrumbs'][] = $this->title;

$soloVoz = '';
$funcionSoloVoz = 'realizarReconocimientoMultipleOrdenado';
$vozActiva = '';
if ($modelSeccion->secTipoRespuesta == 'voz') {
    $soloVoz = 'disabled';
    $funcionSoloVoz = 'realizarReconocimientSoloVoz';
    $vozActiva = 'checked';
    $textoComienzo = 'Desactivar micrófono';
}

$funcionEnvioRespuestas = 'cambiarPreguntaSinOrden';
if ($modelSeccion->secTipoRespuesta == 'ambos') {
    $funcionEnvioRespuestas = 'cambiarPreguntaEspecialSinOrden';
}

$textoBotton = 'Siguiente';
if ($accion == 'pregunta-final') {
    $textoBotton = 'Finalizar';
}
?>

<div id="contenedor-Preguntas">
    <input id="codigoPregunta" name="codigoPregunta" type='hidden' value="<?= $modelSeccion->secCodigo ?>">
    <div class="Menus-create">

        <!-- Un widget que se utiliza para mostrar el siguiente botón. -->
        <?= BotonSiguiente::widget([
            'textoBotton' => $textoBotton,
            'funcionSiguiente' => $funcionEnvioRespuestas,
            'controllador' => 'memoriaauditiva',
            'accion' => $accion,
            'secTipoRespuesta' => $modelSeccion->secTipoRespuesta,
        ]); ?>

        <div class="name-tag">
            <h1><?= $this->title ?></h1>
        </div>
        <br>

        <div class="alert alert-danger" name='error' id="error" role="alert" style="display: none;"></div>

        <!-- Un widget que se utiliza para mostrar el audio y el texto de la Pregunta. -->
        <?= CampoAudio::widget([
            'idDivGeneral' => 'pregunta',
            'audioCargado' => $modelSeccion->seccAudioPregunta,
            'idAudio' => 'audioPegunta',
            'idIconoButton' => 'iconoButtonPregunta',
            'idLabel' => 'preguntaID',
            'textoCampo' => $modelSeccion->secPregunta,
        ]); ?>

        <!-- Un widget que se utiliza para mostrar el audio y el texto de la SupPregunta. -->
        <?= CampoAudio::widget([
            'idDivGeneral' => 'subPregunta',
            'audioCargado' => $modelSeccion->seccAudioSubPregunta,
            'idAudio' => 'audioSupPegunta',
            'idIconoButton' => 'iconoButtonSubPregunta',
            'idLabel' => 'subpreguntaID',
            'textoCampo' => $modelSeccion->seccSubpregunta,
        ]); ?>

        <!-- Un widget que se utiliza para mostrar el audio y el texto de la Pregunta adicional. -->
        <?= CampoAudio::widget([
            'idDivGeneral' => 'preguntaAdicional',
            'audioCargado' => $modelSeccion->seccAudioPreguntaAdicional,
            'ocultarCampo' => 'style="display:none;"',
            'idAudio' => 'audioPreguntaAdicional',
            'idIconoButton' => 'iconoButtonPreguntaAdicional',
            'idLabel' => 'preguntaAdicionalID',
            'textoCampo' => $modelSeccion->seccPreguntaAdicional,
        ]); ?>

        <!-- Un widget que se utiliza para mostrar el micrófono y el texto. -->
        <?= CampoVoz::widget([
            'textoCampo1' => $textoComienzo ?? 'Activar micrófono',
            'funcionVoz' => 'activarMicroCambioTexto3',
            'totalRespuestas' => count($modelRespuestas),
            'ocultarCampoGeneral' => 'style="display:none;"',
            'oculptarCampoMicro' => 'style="display:none;"',
            'funcionActiva' => $funcionSoloVoz,
            'soloVoz' => $soloVoz,
            'vozActiva' => $vozActiva
        ]); ?>

        <!-- Un widget que se utiliza para mostrar el botón "Intentar de nuevo". -->
        <?= CamposImagenes::widget([
            'modelRespuestas' => $modelRespuestas,
            'totalRespuestas' => count($modelRespuestas),
        ]); ?>

        <!-- Un widget que se utiliza para mostrar el botón "Intentar de nuevo". -->
        <?= IntentaloNuevamente::widget([
            'funcionRepetir' => 'repetirImagenes7',
            'numeroTotal' => count($modelRespuestas),
            'TipoRespuestas' => $modelSeccion->secTipoRespuesta
        ]); ?>

        <!-- Un widget que se utiliza para mostrar el botón "Buen trabajo". -->
        <?= IntentaloNuevamente::widget([
            'funcionRepetir' => 'mostrarCampos',
            'numeroTotal' => count($modelRespuestas),
            'TipoRespuestas' => $modelSeccion->secTipoRespuesta,
            'textoMostrar' => 'Buen trabajo ',
            'iconoMostrar' => 'fas fa-arrow-right',
            'textoBoton' => $textoBotton . ' ',
            'idMensajes' => 'mostrarMensajeInformativo',
            'idLabel' => 'buenTrabajo',
        ]); ?>
    </div>
    </br>
    </br>

    <!-- Un widget que se utiliza para mostrar el botones. -->
    <?= BotonesCRC::widget([
        'funcionRepetir' => 'repetirImagenes7',
        'funcionContinuar' => 'siguientePregunta4',
        'totalFotos' => count($modelRespuestas),
        'totalFotosSegundo' => count($modelRespuestas),
        'secTipoRespuesta' => $modelSeccion->secTipoRespuesta,
    ]); ?>
</div>
<script src="js/reconocimiento.js" type="text/javascript">
</script>
<script src="js/accionsPreguntas.js" type="text/javascript">
</script>