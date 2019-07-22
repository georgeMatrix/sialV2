<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_carta_porte');
            $table->string('id_datos_facturacion');
            $table->string('clave_prod_serv');
            $table->string('no_identificacion');
            $table->double('cantidad');
            $table->string('clave_unidad');
            $table->string('unidad');
            $table->string('descripcion');
            $table->double('valor_unitario');
            $table->double('importe');
            $table->string('emisor_rfc');
            $table->string('emisor_razon_social');
            $table->string('emisor_regimen');
            $table->string('receptor_rfc');
            $table->string('receptor_razon_social');
            $table->string('receptor_regimen');

            $table->string('cfdi_t_iva_base')->nullable();
            $table->string('cfdi_t_iva_impuesto')->nullable();
            $table->string('cfdi_t_iva_tipofactor')->nullable();
            $table->string('cfdi_t_iva_tasacuota')->nullable();
            $table->string('cfdi_t_iva_importe')->nullable();
            $table->string('cfdi_t_isr_base')->nullable();
            $table->string('cfdi_t_isr_impuesto')->nullable();
            $table->string('cfdi_t_isr_tipofactor')->nullable();
            $table->string('cfdi_t_isr_tasacuota')->nullable();
            $table->string('cfdi_t_isr_importe')->nullable();
            $table->string('cfdi_r_iva_base')->nullable();
            $table->string('cfdi_r_iva_impuesto')->nullable();
            $table->string('cfdi_r_iva_tipofactor')->nullable();
            $table->string('cfdi_r_iva_tasacuota')->nullable();
            $table->string('cfdi_r_iva_importe')->nullable();
            $table->string('cfdi_r_isr_base')->nullable();
            $table->string('cfdi_r_isr_impuesto')->nullable();
            $table->string('cfdi_r_isr_tipofactor')->nullable();
            $table->string('cfdi_r_isr_tasacuota')->nullable();
            $table->string('cfdi_r_isr_importe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturables');
    }
}