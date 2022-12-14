<?php

namespace common\widgets;

use yii\bootstrap4\Widget;

class IntentaloNuevamente extends Widget
{
    /**
     * @var string
     */
    public $funcionRepetir;
    /**
     * @var string
     */
    public $numeroTotal;
    /**
     * @var string
     */
    public $TipoRespuestas;
    /**
     * @var string
     */
    public $textoMostrar = 'Inténtalo de nuevo';
    /**
     * @var string
     */
    public $iconoMostrar = 'fas fa-undo-alt';
    /**
     * @var string
     */
    public $textoBoton = '';
    /**
     * @var string
     */
    public $idMensajes = 'MensajeRespuesta';

    /**
     * @var string
     */
    public $idLabel = 'intentaloNuevo';

    /**
     * @var string
     */
    public $habilitarTexto = false;

    /**
     * @var string
     */
    public $habilitarBoton = false;

    public function run()
    {
        return $this->render('intentaloNuevamente', [
            'funcionRepetir' => $this->funcionRepetir,
            'numeroTotal' => $this->numeroTotal,
            'TipoRespuestas' => $this->TipoRespuestas,
            'textoMostrar' => $this->textoMostrar,
            'iconoMostrar' => $this->iconoMostrar,
            'textoBoton' => $this->textoBoton,
            'idMensajes' => $this->idMensajes,
            'idLabel' => $this->idLabel,
            'habilitarTexto' => $this->habilitarTexto,
            'habilitarBoton' => $this->habilitarBoton,
        ]);
    }
}
