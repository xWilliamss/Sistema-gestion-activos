-- Ejecutar una sola vez sobre la base de datos gestion_activos26.
-- Requiere MySQL 8+ o MariaDB compatible con InnoDB.

CREATE TABLE IF NOT EXISTS planes_mantenimiento (
    id INT NOT NULL AUTO_INCREMENT,
    activo_id INT NOT NULL,
    tipo ENUM('preventivo') NOT NULL DEFAULT 'preventivo',
    frecuencia_dias SMALLINT UNSIGNED NOT NULL,
    proxima_fecha DATE NOT NULL,
    tecnico VARCHAR(100) DEFAULT NULL,
    prioridad ENUM('baja', 'media', 'alta') NOT NULL DEFAULT 'media',
    estado ENUM('activo', 'pausado') NOT NULL DEFAULT 'activo',
    notas TEXT DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_planes_fecha_estado (estado, proxima_fecha),
    KEY idx_planes_activo (activo_id),
    CONSTRAINT fk_planes_mantenimiento_activo
        FOREIGN KEY (activo_id) REFERENCES activos(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Añade el responsable de cada evento nuevo de historial.
ALTER TABLE historial_activos
    ADD COLUMN usuario VARCHAR(50) NULL AFTER descripcion;

CREATE INDEX idx_historial_activo_fecha ON historial_activos (activo_id, fecha);

