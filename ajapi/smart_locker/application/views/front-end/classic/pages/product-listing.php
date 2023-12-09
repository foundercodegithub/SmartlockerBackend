<!-- breadcrumb -->
<section class="breadcrumb-title-bar colored-breadcrumb">
    <div class="main-content responsive-breadcrumb">
        <h1><?= isset($page_main_bread_crumb) ? $page_main_bread_crumb : 'Product Listing' ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= !empty($this->lang->line('home')) ? $this->lang->line('home') : 'Home' ?></a></li>
                <?php if (isset($right_breadcrumb) && !empty($right_breadcrumb)) {
                    foreach ($right_breadcrumb as $row) {
                ?>
                        <li class="breadcrumb-item"><?= $row ?></li>
                <?php }
                } ?>
                <li class="breadcrumb-item active" aria-current="page"><?= !empty($this->lang->line('products')) ? $this->lang->line('products') : 'Products' ?></li>
            </ol>
        </nav>
    </div>

</section>
<!-- end breadcrumb -->
<input type="hidden" id="product-filters" value='<?= (!empty($filters)) ? escape_array($filters) : ""  ?>' data-key="<?= $filters_key ?>" />
<section class="listing-page content main-content" style="
    padding: 0px;
">
    <div class="product-listing card-solid py-4">
        <div class="row mx-0">
            <!-- Dektop Sidebar -->
           


            <div class="col-md-8 order-md-2 <?= (isset($products['filters']) && !empty($products['filters'])) ? "col-lg-9" : "col-lg-12" ?>">
                <div class="container-fluid filter-section pt-3  pb-3" style="
    width: 1200px;
">
                    <div class="col-12">
                        <div class="dropdown">
                            <div class="filter-bars">
                                <div class="menu js-menu">
                                    <span class="menu__line"></span>
                                    <span class="menu__line"></span>
                                    <span class="menu__line"></span>

                                </div>
                            </div>
                            <div class="col-12 sort-by py-3">
                                <?php if (isset($products) && !empty($products['product'])) { ?>
                                    <div class="dropdown float-md-right d-flex mb-4">
                                        <label class="mr-2 dropdown-label"> <?= !empty($this->lang->line('show')) ? $this->lang->line('show') : 'Show' ?>:</label>
                                        <a class="btn dropdown-border btn-lg dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= ($this->input->get('per-page', true) ? $this->input->get('per-page', true) : '12') ?> <span class="caret"></span></a>
                                        <a href="#" id="product_grid_view_btn" class="grid-view"><i class="fas fa-th"></i></a>
                                        <a href="#" id="product_list_view_btn" class="grid-view"><i class="fas fa-th-list"></i></a>
                                        <div class="dropdown-menu custom-dropdown-menu" aria-labelledby="navbarDropdown" id="per_page_products">
                                            <a class="dropdown-item" href="#" data-value=12>12</a>
                                            <a class="dropdown-item" href="#" data-value=16>16</a>
                                            <a class="dropdown-item" href="#" data-value=20>20</a>
                                            <a class="dropdown-item" href="#" data-value=24>24</a>
                                        </div>
                                    </div>
                                    <div class="ele-wrapper d-flex">
                                        <div class="form-group col-md-4 d-flex" style="
    max-width: 24.33% !important;
">
                                            <label for="product_sort_by" class="w-25"><?= !empty($this->lang->line('sort_by')) ? $this->lang->line('sort_by') : 'Sort By' ?>:</label>
                                            <select id="product_sort_by" class="form-control">
                                                <option><?= !empty($this->lang->line('relevance')) ? $this->lang->line('relevance') : 'Relevance' ?></option>
                                                <option value="top-rated" <?= ($this->input->get('sort') == "top-rated") ? 'selected' : '' ?>><?= !empty($this->lang->line('top_rated')) ? $this->lang->line('top_rated') : 'Top Rated' ?></option>
                                                <option value="date-desc" <?= ($this->input->get('sort') == "date-desc") ? 'selected' : '' ?>><?= !empty($this->lang->line('newest_first')) ? $this->lang->line('newest_first') : 'Newest First' ?></option>
                                                <option value="date-asc" <?= ($this->input->get('sort') == "date-asc") ? 'selected' : '' ?>><?= !empty($this->lang->line('oldest_first')) ? $this->lang->line('oldest_first') : 'Oldest First' ?></option>
                                                <option value="price-asc" <?= ($this->input->get('sort') == "price-asc") ? 'selected' : '' ?>><?= !empty($this->lang->line('price_low_to_high')) ? $this->lang->line('price_low_to_high') : 'Price - Low To High' ?></option>
                                                <option value="price-desc" <?= ($this->input->get('sort') == "price-desc") ? 'selected' : '' ?>><?= !empty($this->lang->line('price_high_to_low')) ? $this->lang->line('price_high_to_low') : 'Price - High To Low' ?></option>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($sub_categories) && !empty($sub_categories)) { ?>
                        <div class="col-md-9 col-sm-12 text-left py-3">
                            <?php if (isset($single_category) && !empty($single_category)) { ?>
                                <span class="h3"><?= $single_category['name'] ?> <?= !empty($this->lang->line('category')) ? $this->lang->line('category') : 'Category' ?></span>
                            <?php } ?>
                        </div>
                        <div class="category-section container-fluid text-center">
                            <div class="row">
                                <?php foreach ($sub_categories as $key => $row) { ?>
                                    <div class="col-md-2 col-sm-6">
                                        <div class="category-image w-75">
                                            <a href="<?= base_url('products/category/' . html_escape($row->slug)) ?>">
                                                <img class="pic-1 lazy" data-src="<?= $row->image ?>">
                                            </a>
                                            <div class="social">
                                                <span><?= html_escape($row->name) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($products) && !empty($products['product'])) { ?>

                        <?php if (isset($_GET['type']) && $_GET['type'] == "list") { ?>
                            <div class="col-md-12 col-sm-6">
                                <div class="row mt-4" itemscope itemtype="https://schema.org/Product">
                                    <div class="col-12">
                                        <h4 class="h4"><?= !empty($this->lang->line('products')) ? $this->lang->line('products') : 'Products' ?></h4>
                                    </div>
                                    <?php foreach ($products['product'] as $row) { ?>
                                        <div class="col-md-3">
                                            <div class="product-grid">
                                                <div class="product-image">
                                                    <div class="product-image-container" style="
    line-height: 150px !important;">
                                                        <a href="<?= base_url('products/details/' . $row['slug']) ?>">
                                                            <link itemprop="image" href="<?= $row['image_sm'] ?>" />
                                                            <img class="pic-1 lazy" data-src="<?= $row['image_sm'] ?>">
                                                        </a>
                                                    </div>
                                                    <ul class="social">
                                                        <?php
                                                        if (count($row['variants']) <= 1) {
                                                            $variant_id = $row['variants'][0]['id'];
                                                            $modal = "";
                                                        } else {
                                                            $variant_id = "";
                                                            $modal = "#quick-view";
                                                        }
                                                        ?><?php $variant_price = ($row['variants'][0]['special_price'] > 0 && $row['variants'][0]['special_price'] != '') ? $row['variants'][0]['special_price'] : $row['variants'][0]['price'];
                                                            $data_min = (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1;
                                                            $data_step = (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1;
                                                            $data_max = (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : 0;
                                                            ?>
                                                        
                                                        <li>
                                                           
                                                        </li>
                                                    </ul>
                                                    <?php if (isset($row['min_max_price']['special_price']) && $row['min_max_price']['special_price'] != '' && $row['min_max_price']['special_price'] != 0 && $row['min_max_price']['special_price'] < $row['min_max_price']['min_price']) { ?>
                                                        <span class="product-new-label"><?= !empty($this->lang->line('Rent & Buy')) ? $this->lang->line('Rent & Buy') : 'Rent & Buy' ?></span>
                                                        <!--<span class="product-discount-label"><?= $row['min_max_price']['discount_in_percentage'] ?>%</span>-->
                                                    <?php } ?>
                                                    <aside class="add-favorite">
                                                        <button type="button" class="btn far fa-heart add-to-fav-btn <?= ($row['is_favorite'] == 1) ? 'fa text-danger' : '' ?>" data-product-id="<?= $row['id'] ?>"></button>
                                                    </aside>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="product-content">
                                                <h3 class="list-product-title title" itemprop="name"><a href="<?= base_url('products/details/' . $row['slug']) ?>"><?= $row['name'] ?></a></h3>
                                                <?php if (isset($row['rating']) && isset($row['no_of_ratings']) && !empty($row['no_of_ratings']) &&  !empty($row['rating']) && $row['no_of_ratings'] != "") { ?>
                                                    <div class="rating" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                                                        <meta itemprop="reviewCount" content="<?= $row['no_of_ratings'] ?>" />
                                                        <meta itemprop="ratingValue" content="<?= $row['rating'] ?>" />
                                                        <input type="text" class="kv-fa rating-loading" value="<?= $row['rating'] ?>" data-size="sm" title="" readonly>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="rating">
                                                        <input type="text" class="kv-fa rating-loading" value="<?= $row['rating'] ?>" data-size="sm" title="" readonly>
                                                    </div>
                                                <?php } ?>
                                                <p class="text-muted list-product-desc" itemprop="description"><?= (isset($row['short_description']) && !empty($row['short_description'])) ? output_escaping(str_replace('\r\n', '&#13;&#10;', $row['short_description'])) : "" ?></p>
                                                <div class="price mb-2 list-view-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                                    <meta itemprop="price" content="<?= $row['variants'][0]['price']; ?>" />
                                                    <meta itemprop="priceCurrency" content="<?= $settings['currency'] ?>" />
                                                </div>
                                                <?php if (!empty($row['min_max_price']['special_price'])) { ?>
                                                    <?= $settings['currency'] ?></i><?= number_format($row['min_max_price']['special_price']) ?>
                                                    <span class="striped-price" itemprop="price"><?= $settings['currency'] . ' ' . number_format($row['min_max_price']['min_price']) ?></span>
                                                <?php } else { ?>
                                                    <span itemprop="price"> <?= $settings['currency'] ?></i><?= number_format($row['min_max_price']['min_price']) ?></span>
                                                <?php } ?>

                                                <div class="button button-sm m-0 p-0">
                                                    <?php $variant_price = ($row['variants'][0]['special_price'] > 0 && $row['variants'][0]['special_price'] != '') ? $row['variants'][0]['special_price'] : $row['variants'][0]['price'];
                                                    $data_min = (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1;
                                                    $data_step = (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1;
                                                    $data_max = (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : 0;
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row w-100">
                                <div class="col-12">
                                    <h4 class="h4"><?= !empty($this->lang->line('products')) ? $this->lang->line('products') : 'Products' ?></h4>
                                </div>
                                <?php foreach ($products['product'] as $row) { ?>
                                    <div class="col-md-4 col-sm-6" itemscope itemtype="https://schema.org/Product" style="
    max-width: 24.33% !important;
">
                                        <div class="product-grid"  style="margin-left: 10px;margin-top: 10px; width:250px;      max-width: fit-content;
    max-height: 270px !important;"
>
                                            <aside class="add-favorite">
                                                <button type="button" class="btn far fa-heart add-to-fav-btn <?= ($row['is_favorite'] == 1) ? 'fa text-danger' : '' ?>" data-product-id="<?= $row['id'] ?>"></button>
                                            </aside>
                                            <div class="product-image">
                                                <div class="product-image-container"style="
    max-width: 250px !important; line-height: 181px !important;
">
                                                    <a href="<?= base_url('products/details/' . $row['slug']) ?>">
                                                        <link itemprop="image" href="<?= $row['image_sm'] ?>" />
                                                        <img class="pic-1 lazy" data-src="<?= $row['image_sm'] ?>">
                                                    </a>
                                                </div>
                                                <ul class="social">
                                                    <?php
                                                    if (count($row['variants']) <= 1) {
                                                        $variant_id = $row['variants'][0]['id'];
                                                        $modal = "";
                                                    } else {
                                                        $variant_id = "";
                                                        $modal = "#quick-view";
                                                    }
                                                    ?>
                                                    <?php $variant_price = ($row['variants'][0]['special_price'] > 0 && $row['variants'][0]['special_price'] != '') ? $row['variants'][0]['special_price'] : $row['variants'][0]['price'];
                                                    $data_min = (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1;
                                                    $data_step = (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1;
                                                    $data_max = (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : 0;
                                                    ?>
                                                    
                                                </ul>
                                                <?php if (isset($row['min_max_price']['special_price']) && $row['min_max_price']['special_price'] != '' && $row['min_max_price']['special_price'] != 0 && $row['min_max_price']['special_price'] < $row['min_max_price']['min_price']) { ?>
                                                    <span class="product-new-label"><?= !empty($this->lang->line('Rent & Buy')) ? $this->lang->line('Rent & Buy') : 'Rent & Buy' ?></span>
                                                    <!--<span class="product-discount-label"><?= $row['min_max_price']['discount_in_percentage'] ?>%</span>-->
                                                <?php } ?>
                                            </div>
                                            <div class="product-content">
                                                <?php if (isset($row['rating']) && isset($row['no_of_ratings']) && !empty($row['no_of_ratings']) &&  !empty($row['rating']) && $row['no_of_ratings'] != "") { ?>
                                                    <div class="rating" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                                                        <meta itemprop="reviewCount" content="<?= $row['no_of_ratings'] ?>" />
                                                        <meta itemprop="ratingValue" content="<?= $row['rating'] ?>" />
                                                        <input type="text" class="kv-fa rating-loading" itemprop="ratingValue" value="<?= $row['rating'] ?>" data-size="sm" title="" readonly>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="rating">
                                                        <input type="text" class="kv-fa rating-loading" value="<?= $row['rating'] ?>" data-size="sm" title="" readonly>
                                                    </div>
                                                <?php } ?>
                                                <div class="product-content">
                                                    <meta itemprop="description" content="<?= (isset($row['short_description']) && !empty($row['short_description'])) ? output_escaping(str_replace('\r\n', '&#13;&#10;', $row['short_description'])) : "" ?>" />
                                                    <h3 class="title" itemprop="name"><a href="<?= base_url('products/details/' . $row['slug']) ?>"><?= $row['name'] ?></a></h3>
                                                    <div itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                                        <meta itemprop="price" content="<?= $row['variants'][0]['price']; ?>" />
                                                        <meta itemprop="priceCurrency" content="<?= $settings['currency'] ?>" />
                                                    </div>
                                                    <div class="price">
                                                        <?php $price = get_price_range_of_product($row['id']);
                                                        echo $price['range'];
                                                        ?>
                                                    </div>
                                                    <?php $variant_price = ($row['variants'][0]['special_price'] > 0 && $row['variants'][0]['special_price'] != '') ? $row['variants'][0]['special_price'] : $row['variants'][0]['price'];
                                                    $data_min = (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1;
                                                    $data_step = (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1;
                                                    $data_max = (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : 0;
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if ((!isset($sub_categories) || empty($sub_categories)) && (!isset($products) || empty($products['product']))) { ?>
                        <div class="col-12 text-center">
                            <h1 class="h2">No Products Found.</h1>
                            <a href="<?= base_url('products') ?>" class="button button-rounded button-warning"><?= !empty($this->lang->line('go_to_shop')) ? $this->lang->line('go_to_shop') : 'Go to Shop' ?></a>
                        </div>
                    <?php } ?>
                    <nav class="text-center mt-4">
                        <?= (isset($links)) ? $links : '' ?>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Mobile Filter Menu -->
    </div>
</section>