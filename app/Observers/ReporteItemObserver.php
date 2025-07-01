<?php

namespace App\Observers;

use App\Models\ReporteItem;

class ReporteItemObserver
{
    /**
     * Handle the ReporteItem "created" event.
     */
    public function created(ReporteItem $reporteItem): void
    {
        if ($reporteItem->reporte) {
            $reporteItem->reporte->recalcularTotal();
        }
    }

    /**
     * Handle the ReporteItem "updated" event.
     */
    public function updated(ReporteItem $reporteItem): void
    {
        if ($reporteItem->reporte) {
            $reporteItem->reporte->recalcularTotal();
        }
    }

    /**
     * Handle the ReporteItem "deleted" event.
     */
    public function deleted(ReporteItem $reporteItem): void
    {
        if ($reporteItem->reporte) {
            $reporteItem->reporte->recalcularTotal();
        }
    }

    /**
     * Handle the ReporteItem "restored" event.
     */
    public function restored(ReporteItem $reporteItem): void
    {
        //
    }

    /**
     * Handle the ReporteItem "force deleted" event.
     */
    public function forceDeleted(ReporteItem $reporteItem): void
    {
        //
    }
}
