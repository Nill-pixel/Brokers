INSERT INTO `stocks` (`type`, `company`, `designation`, `issue_date`, `face_value`, `created_at`, `updated_at`)
VALUES
('stock', 'Empresa A', 'Ação A', '2020-01-01', 100.00, NOW(), NOW()),
('bond', 'Empresa B', 'Obrigação B', '2021-02-01', 500.00, NOW(), NOW());

-- Cotações para a Ação A da Empresa A
INSERT INTO `stock_quotes` (`stock_id`, `date`, `closing_price`, `created_at`, `updated_at`)
VALUES
(1, '2024-06-01', 110.00, NOW(), NOW()), -- Cotação em 1 de junho de 2024
(1, '2024-06-02', 112.50, NOW(), NOW()),
(1, '2024-06-03', 108.75, NOW(), NOW());

-- Cotações para a Obrigação B da Empresa B
INSERT INTO `stock_quotes` (`stock_id`, `date`, `closing_price`, `created_at`, `updated_at`)
VALUES
(2, '2024-06-01', 505.00, NOW(), NOW()), -- Cotação em 1 de junho de 2024
(2, '2024-06-02', 503.75, NOW(), NOW()),
(2, '2024-06-03', 510.00, NOW(), NOW());
