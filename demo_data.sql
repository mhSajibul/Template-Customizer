-- Store Templates
INSERT INTO store_templates (name, preview_image, template_file) VALUES
('Modern', 'modern.jpg', 'modern_template.php'),
('Classic', 'classic.jpg', 'classic_template.php'),
('Minimal', 'minimal.jpg', 'minimal_template.php'),
('Colorful', 'colorful.jpg', 'colorful_template.php');

-- Fields for Modern Template (ID = 1)
INSERT INTO store_template_fields (template_id, field_name, field_label, field_type) VALUES
(1, 'store_name', 'Store Name', 'text'),
(1, 'welcome_text', 'Welcome Text', 'text'),
(1, 'text_color', 'Text Color', 'color'),
(1, 'bg_color', 'Background Color', 'color'),
(1, 'banner', 'Banner Image', 'file'),
(1, 'contact_info', 'Contact Info', 'text');

-- Fields for Classic Template (ID = 2)
INSERT INTO store_template_fields (template_id, field_name, field_label, field_type) VALUES
(2, 'store_name', 'Store Name', 'text'),
(2, 'welcome_text', 'Welcome Text', 'text'),
(2, 'text_color', 'Text Color', 'color'),
(2, 'bg_color', 'Background Color', 'color'),
(2, 'banner', 'Banner Image', 'file'),
(2, 'contact_info', 'Contact Info', 'text');

-- Fields for Minimal Template (ID = 3)
INSERT INTO store_template_fields (template_id, field_name, field_label, field_type) VALUES
(3, 'store_name', 'Store Name', 'text'),
(3, 'welcome_text', 'Welcome Text', 'text'),
(3, 'text_color', 'Text Color', 'color'),
(3, 'bg_color', 'Background Color', 'color'),
(3, 'banner', 'Banner Image', 'file'),
(3, 'contact_info', 'Contact Info', 'text');

-- Fields for Colorful Template (ID = 4)
INSERT INTO store_template_fields (template_id, field_name, field_label, field_type) VALUES
(4, 'store_name', 'Store Name', 'text'),
(4, 'welcome_text', 'Welcome Text', 'text'),
(4, 'text_color', 'Text Color', 'color'),
(4, 'bg_color', 'Background Color', 'color'),
(4, 'banner', 'Banner Image', 'file'),
(4, 'contact_info', 'Contact Info', 'text');