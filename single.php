<?php

/**
 * The single post template.
 * Muestra el contenido completo de una entrada y sus comentarios.
 *
 * @package bootstrap-basic4
 */

get_header(); ?>

<div class="container mb-5">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <!-- Card del producto -->
                <div class="card shadow-sm mb-4" style="border: none;">
                    
                    <?php if (get_field('imagen_producto')): ?>
                        <img src="<?php the_field('imagen_producto'); ?>" 
                             class="card-img-top img-fluid" 
                             alt="<?php the_field('titulo_producto'); ?>">
                    <?php elseif (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', array('class' => 'card-img-top img-fluid')); ?>
                    <?php endif; ?>

                    <div class="card-body">
                        <!-- Título -->
                        <h2 class="card-title text-primary">
                            <?php the_field('titulo_producto'); ?>
                        </h2>

                        <!-- Descripción corta -->
                        <?php if (get_field('descripcion_corta')): ?>
                            <p class="card-text text-muted">
                                <?php the_field('descripcion_corta'); ?>
                            </p>
                        <?php endif; ?>

                        <!-- Precio -->
                        <p class="h4 text-success mb-3">
                            💲 <?php the_field('precio_producto'); ?>
                        </p>

                        <!-- Descripción larga -->
                        <?php if (get_field('descripcion_larga')): ?>
                            <div class="mt-3">
                                <?php the_field('descripcion_larga'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Stock -->
                        <?php if (get_field('stock_producto')): ?>
                            <p class="mt-3">
                                <span class="badge badge-info">
                                    Stock disponible: <?php the_field('stock_producto'); ?> unidades
                                </span>
                            </p>
                        <?php endif; ?>

                        <!-- Botón de pedido -->
                        <?php if (get_field('url_pedido_producto')): ?>
                            <a href="<?php the_field('url_pedido_producto'); ?>" 
                               class="btn btn-lg btn-primary js-cotizar-delicia mt-3" target="_blank" rel="noopener">
                                🛒 Solicitar pedido
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Contenido del post (si aplica) -->
                <div class="mt-4">
                    <div><?php the_content(); ?></div>
                </div>

            </div>
        </div>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
