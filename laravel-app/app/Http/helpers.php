<?php

    /**
     * Función para las rutas activas Administración
     *
     */
    function setActiveRoute($name)
    {
        return request()->routeIs($name) ? 'active' : '';
    }

    /**
     * Función para las rutas activas
     *
     */
    function setActiveRouteHome($name)
    {
        return request()->routeIs($name) ? 'current' : '';
    }
