<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
Ce poste est protégé par mot. Entrez le mot de passe pour accéder aux commentaires.<?php
return;
}
?>
<div id="ms_comments">
	<?php if ( have_comments() ) : ?>
		<div id="ms_comments_content">
			<h2 id="comments"><?php comments_number('Aucunes réponses', '1 réponse', '% réponses' );?></h2>
			<div class="navigation">
				<div class="next-posts"><?php previous_comments_link() ?></div>
				<div class="prev-posts"><?php next_comments_link() ?></div>
			</div>
			<ol class="commentlist">
				<?php wp_list_comments(); ?>
			</ol>
			<div class="navigation">
				<div class="next-posts"><?php previous_comments_link() ?></div>
				<div class="prev-posts"><?php next_comments_link() ?></div>
			</div>
		<?php else : // this is displayed if there are no comments so far ?>
			<?php if ( comments_open() ) : ?>
				<!-- If comments are open, but there are no comments. -->
			<?php else : // comments are closed ?>
				<p>Commentaires sont désactivés</p>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( comments_open() ) : ?>
			<div id="respond">
				<div class="cancel-comment-reply">
					<?php cancel_comment_reply_link(); ?>
				</div>
				<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
					<p>Vous devez être <a href="<?php echo wp_login_url( get_permalink() ); ?>">connecté</a> pour poster un commentaire</p>
				<?php else : ?>
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
						<?php if ( is_user_logged_in() ) : ?>
							<p>Connecté en tant que <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
						<?php else : ?>
							<section>
								<div>
									<label for="author">Nom / pseudo <?php if ($req) echo "(required)"; ?></label>
									<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
								</div>
								<div>
									<label for="email">Adresse email<?php if ($req) echo "(required)"; ?></label>
									<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
								</div>
								<div>
									<label for="url">Site internet</label>
									<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
								</div>
							</section>
						<?php endif; ?>
						<section>
							<div>
								<label for="content">Votre message</label><br>
								<textarea name="comment" id="comment" cols="80" rows="5" tabindex="4"></textarea>
							</div>
						</section>
						<br>
						<div>
							<input name="submit" type="submit" id="submit" class="redBG" tabindex="5" value="Commentez !" />
							<?php comment_id_fields(); ?>
						</div>
						<?php do_action('comment_form', $post->ID); ?>
					</form>
				<?php endif; // If registration required and not logged in ?>
			</div>
		</div>
	<?php endif; ?>
</div>
