<?php

    /**
     * Función para las rutas activas
     *
     */
    function setActiveRoute($name)
    {
        return request()->routeIs($name) ? 'current' : '';
    }