<?php
include 'common.php';
include 'header.php';
include 'menu.php';
?>

<div class="main">
    <div class="body container">
        <?php include 'page-title.php'; ?>
        <div class="row typecho-page-main" role="main">
            <div class="col-mb-12">
                <ul class="typecho-option-tabs fix-tabs clearfix">
                    <li class="current"><a href="<?php $options->adminUrl('themes.php'); ?>"><?php _e('Danh sách'); ?></a>
                    </li>
                    <?php if (\Widget\Themes\Files::isWriteable()): ?>
                        <li><a href="<?php $options->adminUrl('theme-editor.php'); ?>"><?php _e('Chỉnh sửa'); ?></a></li>
                    <?php endif; ?>
                    <?php if (\Widget\Themes\Config::isExists()): ?>
                        <li><a href="<?php $options->adminUrl('options-theme.php'); ?>"><?php _e('Cài đặt'); ?></a></li>
                    <?php endif; ?>
                </ul>

                <div class="typecho-table-wrap">
                    <table class="typecho-list-table typecho-theme-list">
                        <colgroup>
                            <col width="35%"/>
                            <col/>
                        </colgroup>

                        <thead>
                        <th><?php _e('Ảnh chụp'); ?></th>
                        <th><?php _e('Chi tiết'); ?></th>
                        </thead>

                        <tbody>
                        <?php if ($options->missingTheme): ?>
                            <tr id="theme-<?php $options->missingTheme; ?>" class="current">
                                <td colspan="2" class="warning">
                                    <p><strong><?php _e('Thư mục "%s" của theme trước đó không tồn tại hoặc đã bị đổi tên hoặc không tồn tại. Bạn có thể tải lên lại theme đó hoặc kích hoạt theme khác.', $options->missingTheme); ?></strong></p>
                                    <ul>
                                        <li><?php _e('Làm mới trang, sau khi tải lên lại theme trước đó thì thông báo này sẽ biến mất.'); ?></li>
                                        <li><?php _e('Khi kích hoạt theme mới, dữ liệu cài đặt cho theme hiện tại sẽ bị xóa bỏ.'); ?></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php \Widget\Themes\Rows::alloc()->to($themes); ?>
                        <?php while ($themes->next()): ?>
                            <tr id="theme-<?php $themes->name(); ?>"
                                class="<?php if ($themes->activated && !$options->missingTheme): ?>current<?php endif; ?>">
                                <td valign="top"><img src="<?php $themes->screen(); ?>"
                                                      alt="<?php $themes->name(); ?>"/></td>
                                <td valign="top">
                                    <b style="font-size: 22px;">I. <?php '' != $themes->title ? $themes->title() : $themes->name(); ?></b>
                                    <p>
                                        <?php if ($themes->author): ?><b><?php _e('1. Tác giả:'); ?></b> <?php if ($themes->homepage): ?><a href="<?php $themes->homepage() ?>"><?php endif; ?><?php $themes->author(); ?><?php if ($themes->homepage): ?></a><?php endif; ?><?php endif; ?>
                                    </p>
                                    <p>
                                        <?php if ($themes->version): ?><b><?php _e('2. Phiên bản:'); ?></b> <?php $themes->version() ?><?php endif; ?>
                                    </p>
                                    <p>
                                        <b style="font-size: 18px;">II. Giới thiệu</b><br>
                                        <?php echo nl2br($themes->description); ?>
                                    </p>
                                        <?php if ($options->theme != $themes->name || $options->missingTheme): ?>
                                        <p>
                                            <?php if (\Widget\Themes\Files::isWriteable()): ?>
                                                <b>[</b><a href="<?php $options->adminUrl('theme-editor.php?theme=' . $themes->name); ?>"><b><?php _e('Chỉnh sửa'); ?></b></a><b>]</b> &nbsp;
                                            <?php endif; ?>
                                                <b>[</b><a href="<?php $security->index('/action/themes-edit?change=' . $themes->name); ?>"><b><?php _e('Kích hoạt'); ?></b></a><b>]</b> &nbsp;
                                        </p>
                                    <?php else: ?>
                                        <p>
                                                <b>[</b><a href="<?php $options->adminUrl('theme-editor.php?theme=' . $themes->name); ?>"><b><?php _e('Chỉnh sửa'); ?></b></a><b>]</b> &nbsp;
                                                <b>[</b><a href="<?php $options->adminUrl('/options-theme.php'); ?>"><b><?php _e('Cài đặt'); ?></b></a><b>]</b> &nbsp;
                                        </p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'copyright.php';
include 'common-js.php';
include 'footer.php';
?>
