<?php 
/**
 * Upcoming Event widget class
 *
 * @since 1.0
 */
class WP_Widget_Upcoming_Event extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'event_widget', 'description' => __( "The upcoming event widget") );
        parent::__construct('upcoming-events', __('Tokokoo Upcoming Event'), $widget_ops);
        $this->alt_option_name = 'widget_upcoming_events';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_upcoming_events', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Upcoming Event' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;

        $r = new WP_Query( apply_filters( 'widget_event_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_type'=>'event','post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
        ?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>

        <ul>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <li>
                    <div class="date-event">
                        <?php $date = get_post_meta( get_the_ID(), '_event_date', true );?>

                        <span class="day">
                            <?php echo date("d", strtotime($date));?>
                        </span>

                        <span class="date">
                            <?php echo date("M", strtotime($date));?>
                        </span>

                        <span class="year">
                            <?php echo date("Y", strtotime($date));?>
                        </span>
                    </div>
                    
                    <div class="event-data">
                        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
                        
                        <span class="venue">
                            <?php echo get_post_meta( get_the_ID(), '_event_venue', true );?> 
                        </span>

                        <span class="buy-link">
                            <?php $buy_link =  get_post_meta( get_the_ID(), '_event_buy_link', true );?> 
                            <a href="<?php echo esc_attr( $buy_link)?>" target="_blank"><?php _e('Buy Ticket','tokokoo')?></a>
                        </span>
                    </div>

                </li>
            <?php endwhile; ?>
            </ul>
   
        <?php echo $after_widget; ?>
    <?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_upcoming_events', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_upcoming_events']) )
            delete_option('widget_upcoming_events');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_upcoming_events', 'widget');
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of events to show:' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

    <?php
    }

}
add_action('widgets_init', create_function('', "register_widget('WP_Widget_Upcoming_Event');"));
