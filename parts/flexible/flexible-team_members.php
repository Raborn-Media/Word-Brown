<?php
?>

<!-- BEGIN  team-members-section -->
<section class="team-members-section">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <?php
                $featured_posts = get_sub_field( 'co-founder' );
                if ( $featured_posts ): ?>
                    <div class="two-in-row">
                        <?php foreach ( $featured_posts as $post ):
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata( $post );
                            $members_full_name = get_field( 'members_full_name' );
                            $members_position  = get_field( 'members_position' );
                            $members_company   = get_field( 'members_company' );
                            ?>
                            <div class="two-in-row__item">
                                <div class="item-imege">
                                    <a href="#modal-<?php echo $post->ID; ?>" class="open-modal">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                                <h4 class="member-name">
                                    <?php the_title(); ?>
                                </h4>
                                <p class="members-position">
                                    <?php echo $members_position; ?>
                                </p>
                                <p class="members-company">
                                    <?php echo $members_company; ?>
                                </p>
                                <div
                                    id="modal-<?php echo $post->ID; ?>" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>
                                    class="modal">
                                    <div class="member-bio">
                                        <div class="member-bio__heading">
                                            <h4 class="member-name">
                                                <?php echo $members_full_name; ?>
                                            </h4>
                                            <p class="members-position">
                                                <?php echo $members_position; ?>
                                            </p>
                                            <p class="members-company">
                                                <?php echo $members_company; ?>
                                            </p>
                                        </div>
                                        <div class="bio-text">
                                            <article>
                                                <?php the_content(); ?>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php
                $three_members_in_row = get_sub_field( 'three_members_in_row' );
                if ( $three_members_in_row ): ?>
                    <div class="three-in-row">
                        <?php foreach ( $three_members_in_row as $post ):
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata( $post );
                            $members_full_name = get_field( 'members_full_name' );
                            $members_position  = get_field( 'members_position' );
                            $members_company   = get_field( 'members_company' );
                            ?>
                            <div class="three-in-row__item">
                                <div class="item-imege">
                                    <a href="#modal-<?php echo $post->ID; ?>" class="open-modal">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                                <h4 class="member-name">
                                    <?php the_title(); ?>
                                </h4>
                                <p class="members-position">
                                    <?php echo $members_position; ?>
                                </p>
                                <p class="members-company">
                                    <?php echo $members_company; ?>
                                </p>
                                <div
                                    id="modal-<?php echo $post->ID; ?>" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>
                                    class="modal">
                                    <div class="member-bio">
                                        <div class="member-bio__heading">
                                            <h4 class="member-name">
                                                <?php echo $members_full_name; ?>
                                            </h4>
                                            <p class="members-position">
                                                <?php echo $members_position; ?>
                                            </p>
                                            <p class="members-company">
                                                <?php echo $members_company; ?>
                                            </p>
                                        </div>
                                        <div class="bio-text">
                                            <article>
                                                <?php the_content(); ?>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>

                <?php $four_members_in_row_posts = get_sub_field( 'four_members_in_row' );
                if ( $four_members_in_row_posts ): ?>
                    <div class="four-in-row">
                        <?php foreach ( $four_members_in_row_posts as $post ):
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata( $post );
                            $members_full_name = get_field( 'members_full_name' );
                            $members_position  = get_field( 'members_position' );
                            $members_company   = get_field( 'members_company' );
                            ?>
                            <div class="four-in-row__item">
                                <div class="item-imege">
                                    <a href="#modal-<?php echo $post->ID; ?>" class="open-modal">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                                <h4 class="member-name">
                                    <?php the_title(); ?>
                                </h4>
                                <p class="members-position">
                                    <?php echo $members_position; ?>
                                </p>
                                <p class="members-company">
                                    <?php echo $members_company; ?>
                                </p>
                                <div
                                    id="modal-<?php echo $post->ID; ?>" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>
                                    class="modal">
                                    <div class="member-bio">
                                        <div class="member-bio__heading">
                                            <h4 class="member-name">
                                                <?php echo $members_full_name; ?>
                                            </h4>
                                            <p class="members-position">
                                                <?php echo $members_position; ?>
                                            </p>
                                            <p class="members-company">
                                                <?php echo $members_company; ?>
                                            </p>
                                        </div>
                                        <div class="bio-text">
                                            <article>
                                                <?php the_content(); ?>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>

                <?php
                $five_members_in_row_posts = get_sub_field( 'five_members_in_row' );
                if ( $five_members_in_row_posts ): ?>
                <div class="five-in-row">
                    <?php foreach ( $five_members_in_row_posts as $post ):
                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata( $post );
                        $members_full_name = get_field( 'members_full_name' );
                        $members_position  = get_field( 'members_position' );
                        $members_company   = get_field( 'members_company' );
                        ?>
                        <div class="five-in-row__item">
                            <div class="item-imege">
                                <a href="#modal-<?php echo $post->ID; ?>" class="open-modal">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                            <h4 class="member-name">
                                <?php the_title(); ?>
                            </h4>
                            <p class="members-position">
                                <?php echo $members_position; ?>
                            </p>
                            <p class="members-company">
                                <?php echo $members_company; ?>
                            </p>
                            <div
                                id="modal-<?php echo $post->ID; ?>" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>
                                class="modal">
                                <div class="member-bio">
                                    <div class="member-bio__heading">
                                        <h4 class="member-name">
                                            <?php echo $members_full_name; ?>
                                        </h4>
                                        <p class="members-position">
                                            <?php echo $members_position; ?>
                                        </p>
                                        <p class="members-company">
                                            <?php echo $members_company; ?>
                                        </p>
                                    </div>
                                    <div class="bio-text">
                                        <article>
                                            <?php the_content(); ?>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
    </div>

</section>
<!-- END  team-members-section -->
