<?php
include 'header.php';
?>

    
    <div class="page-header text-center">
        <div class="container">
            <h1></i>Template Customizer</h1>
            <p class="lead">Select and personalize your store template in minutes</p>
        </div>
    </div>
    
    <div class="container">
        <?php if (!isset($_GET['template_id'])): ?>
        <div class="mb-4">
            <h2 class="section-title">Choose Your Template</h2>
            <p class="text-muted">Browse through our collection and select the perfect template for your store</p>
        </div>
        
        <div class="row g-4">
            <?php
            $templates = $conn->query("SELECT * FROM store_templates");
            while ($tpl = $templates->fetch_assoc()): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="template-card card h-100">
                        <div class="card-img-container">
                            <img src="assets/uploads/<?= $tpl['preview_image'] ?>" class="card-img-top" alt="<?= $tpl['name'] ?> Preview">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $tpl['name'] ?></h5>
                            <p class="card-text text-muted flex-grow-1"><?= substr($tpl['description'] ?? 'A customizable store template', 0, 80) . (strlen($tpl['description'] ?? '') > 80 ? '...' : '') ?></p>
                            <a href="?template_id=<?= $tpl['id'] ?>" class="btn btn-select btn-primary mt-2">
                                <i class="fas fa-check-circle me-1"></i> Select
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        
        <?php else:
            $tid = (int)$_GET['template_id'];
            $template = $conn->query("SELECT * FROM store_templates WHERE id = $tid")->fetch_assoc();
            $fields = $conn->query("SELECT * FROM store_template_fields WHERE template_id = $tid");
        ?>
        
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?">Templates</a></li>
                <li class="breadcrumb-item active"><?= $template['name'] ?? 'Customize' ?></li>
            </ol>
        </nav>
        
        <div class="form-container">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h3><i class="fas fa-sliders-h me-2"></i>Customize Your Template</h3>
                    <p class="text-muted">Make it your own by adjusting the options below</p>
                </div>
                <?php if (isset($template['preview_image'])): ?>
                <div class="col-md-4 text-end">
                    <div class="template-preview">
                        <img src="assets/uploads/<?= $template['preview_image'] ?>" alt="Template Preview" class="img-fluid rounded" style="max-height: 100px;">
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <form action="customization.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="template_id" value="<?= $tid ?>">
                
                <div class="row">
                    <?php while ($field = $fields->fetch_assoc()): ?>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label" for="field-<?= $field['field_name'] ?>">
                                    <?= $field['field_label'] ?>
                                </label>
                                
                                <?php if ($field['field_type'] == 'text'): ?>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-font"></i>
                                        </span>
                                        <input 
                                            type="text" 
                                            name="fields[<?= $field['field_name'] ?>]" 
                                            id="field-<?= $field['field_name'] ?>"
                                            class="form-control" 
                                            placeholder="<?= $field['placeholder'] ?? 'Enter ' . strtolower($field['field_label']) ?>"
                                        >
                                    </div>
                                    
                                <?php elseif ($field['field_type'] == 'color'): ?>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-palette"></i>
                                        </span>
                                        <input 
                                            type="color" 
                                            name="fields[<?= $field['field_name'] ?>]" 
                                            id="field-<?= $field['field_name'] ?>"
                                            class="form-control form-control-color" 
                                            value="<?= $field['default_value'] ?? '#ffffff' ?>"
                                            title="Choose color"
                                        >
                                    </div>
                                    
                                <?php elseif ($field['field_type'] == 'file'): ?>
                                    <div class="file-upload-wrapper">
                                        <label for="field-<?= $field['field_name'] ?>" class="custom-file-upload">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <span>Choose a file</span>
                                            <small class="text-muted d-block mt-1">or drag and drop here</small>
                                        </label>
                                        <input 
                                            type="file" 
                                            name="files[<?= $field['field_name'] ?>]" 
                                            id="field-<?= $field['field_name'] ?>"
                                            class="form-control" 
                                            accept="<?= $field['allowed_types'] ?? 'image/*' ?>"
                                        >
                                    </div>
                                    
                                <?php endif; ?>
                                
                                <?php if (!empty($field['help_text'])): ?>
                                    <div class="form-text text-muted mt-1">
                                        <i class="fas fa-info-circle me-1"></i> <?= $field['help_text'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="?" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back to Templates
                    </a>
                    <button type="submit" class="btn btn-save btn-primary">
                        <i class="fas fa-save me-1"></i> Save Customization
                    </button>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
    
<?= include 'footer.php'?>