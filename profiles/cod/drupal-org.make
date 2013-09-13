; This file was auto-generated by drush make
api = 2
core = 7.x

; Contributed modules.

projects[addressfield][version] = "1.0-beta4"
projects[addressfield][type] = "module"
projects[addressfield][subdir] = "contrib"

projects[admin_menu][type] = "module"
projects[admin_menu][version] = "3.x-dev"
projects[admin_menu][subdir] = "contrib"

projects[advanced_help][type] = "module"
projects[advanced_help][version] = "1.0"
projects[advanced_help][subdir] = "contrib"

projects[auto_nodetitle][type] = "module"
projects[auto_nodetitle][version] = "1.0"
projects[auto_nodetitle][subdir] = "contrib"

projects[ckeditor][type] = "module"
projects[ckeditor][subdir] = "contrib"
projects[ckeditor][download][type] = "git"
projects[ckeditor][download][url] = "http://git.drupal.org/project/ckeditor.git"
; Use Libraries API for ckeditor
; http://drupal.org/node/1063482#comment-6964504
projects[ckeditor][download][branch] = "7.x-1.x"
projects[ckeditor][download][revision] = "4086c0c958d7a4dd8bb0891fb35e235493367397"

projects[commerce][type] = "module"
projects[commerce][version] = "1.7"
projects[commerce][subdir] = "contrib"

projects[commerce_features][type] = "module"
projects[commerce_features][version] = "1.0-rc1"
projects[commerce_features][subdir] = "contrib"

projects[commerce_registration][type] = "module"
projects[commerce_registration][version] = "2.0-beta5"
projects[commerce_registration][subdir] = "contrib"

projects[commerce_stock][type] = "module"
projects[commerce_stock][version] = "2.0-alpha4"
projects[commerce_stock][subdir] = "contrib"

projects[content_access][type] = "module"
projects[content_access][version] = "1.2-beta2"
projects[content_access][subdir] = "contrib"

projects[conditional_fields][type] = "module"
projects[conditional_fields][version] = "3.x-dev"
projects[conditional_fields][subdir] = "contrib"

projects[context][type] = "module"
projects[context][version] = "3.0-beta6"
projects[context][subdir] = "contrib"

projects[ctools][type] = "module"
projects[ctools][subdir] = "contrib"
projects[ctools][version] = "1.3"

projects[date][version] = "2.6"
projects[date][type] = "module"
projects[date][subdir] = "contrib"

projects[date_ical][version] = "2.2"
projects[date_ical][type] = "module"
projects[date_ical][subdir] = "contrib"

projects[devel][version] = "1.3"
projects[devel][type] = "module"
projects[devel][subdir] = "contrib"

projects[diff][version] = "3.2"
projects[diff][type] = "module"
projects[diff][subdir] = "contrib"

projects[entity][type] = "module"
projects[entity][version] = "1.1"
projects[entity][subdir] = "contrib"

projects[entityreference][type] = "module"
projects[entityreference][version] = "1.0"
projects[entityreference][subdir] = "contrib"

projects[entityreference_prepopulate][type] = "module"
projects[entityreference_prepopulate][version] = "1.3"
projects[entityreference_prepopulate][subdir] = "contrib"

projects[features][version] = "1.0"
projects[features][type] = "module"
projects[features][subdir] = "contrib"

projects[field_group][type] = "module"
projects[field_group][version] = "1.1"
projects[field_group][subdir] = "contrib"

projects[field_permissions][type] = "module"
projects[field_permissions][version] = "1.0-beta2"
projects[field_permissions][subdir] = "contrib"

projects[field_select_ct][type] = "module"
projects[field_select_ct][version] = "1.0-alpha1"
projects[field_select_ct][subdir] = "contrib"

projects[field_collection][type] = "module"
projects[field_collection][version] = "1.0-beta5"
projects[field_collection][subdir] = "contrib"

projects[flag][type] = "module"
projects[flag][version] = "2.1"
projects[flag][subdir] = "contrib"

projects[inline_entity_form][type] = "module"
projects[inline_entity_form][version] = "1.2"
projects[inline_entity_form][subdir] = "contrib"

projects[i18n][type] = "module"
projects[i18n][version] = "1.8"
projects[i18n][subdir] = "contrib"

projects[jquery_update][version] = "2.x-dev"
projects[jquery_update][type] = "module"
projects[jquery_update][subdir] = "contrib"

projects[libraries][type] = "module"
projects[libraries][subdir] = "contrib"
projects[libraries][version] = "2.1"

projects[link][type] = "module"
projects[link][version] = "1.1"
projects[link][subdir] = "contrib"

projects[module_filter][type] = "module"
projects[module_filter][subdir] = "contrib"
projects[module_filter][version] = "1.7"

projects[mollom][type] = "module"
projects[mollom][subdir] = "contrib"
projects[mollom][version] = "2.6"

projects[oauth][type] = "module"
projects[oauth][subdir] = "contrib"
projects[oauth][version] = "3.1"

projects[oauthconnector][type] = "module"
projects[oauthconnector][subdir] = "contrib"
projects[oauthconnector][download][type] = "git"
projects[oauthconnector][download][url] = "http://git.drupal.org/project/oauthconnector.git"
projects[oauthconnector][download][branch] = "7.x-1.x"
projects[oauthconnector][download][revision] = "0ce7ac9614710c0f68d0a58cb4ae4667f8bd6fa7"

projects[og][type] = "module"
projects[og][version] = "2.2"
projects[og][subdir] = "contrib"

; og_group_ref field should respect og_user_access()
; http://drupal.org/node/1902086#comment-7026516
projects[og][patch][] = "http://drupal.org/files/1902086-og-ref-respect-og-user-access-3.patch"

; og_ui should give users the theme, not admin ui when creating groups
; http://drupal.org/node/1800208
projects[og][patch][] = "http://drupal.org/files/og_ui-group_node_add_theme-1800208-5.patch"

projects[panelizer][type] = "module"
projects[panelizer][subdir] = "contrib"
projects[panelizer][version] = "3.1"

projects[panels][type] = "module"
projects[panels][version] = "3.3"
projects[panels][subdir] = "contrib"

; Fatal error: Call to undefined function panels_get_layouts()
; http://drupal.org/node/1828684#comment-6694732
projects[panels][patch][] = "http://drupal.org/files/1828684-layout-fix-6.patch"

; PHP 5.3.9 Strict Warning on Panels Empty Value
; http://drupal.org/node/1632898#comment-6412840
projects[panels][patch][] = "http://drupal.org/files/panels-n1632898-15.patch"

projects[panels_tabs][type] = "module"
projects[panels_tabs][version] = "1.x-dev"
projects[panels_tabs][subdir] = "contrib"

projects[pathauto][type] = "module"
projects[pathauto][version] = "1.2"
projects[pathauto][subdir] = "contrib"

projects[quicktabs][type] = "module"
projects[quicktabs][version] = "3.4"
projects[quicktabs][subdir] = "contrib"

projects[rules][type] = "module"
projects[rules][version] = "2.3"
projects[rules][subdir] = "contrib"

projects[strongarm][version] = "2.x-dev"
projects[strongarm][type] = "module"
projects[strongarm][subdir] = "contrib"

projects[title][type] = "module"
projects[title][version] = "1.0-alpha5"
projects[title][subdir] = "contrib"

projects[token][type] = "module"
projects[token][version] = "1.5"
projects[token][subdir] = "contrib"

projects[variable][type] = "module"
projects[variable][version] = "2.2"
projects[variable][subdir] = "contrib"

projects[views][version] = "3.7"
projects[views][type] = "module"
projects[views][subdir] = "contrib"

projects[views_autorefresh][version] = "1.0-beta2"
projects[views_autorefresh][type] = "module"
projects[views_autorefresh][subdir] = "contrib"

projects[views_field_view][version] = "1.1"
projects[views_field_view][type] = "module"
projects[views_field_view][subdir] = "contrib"

projects[views_send][type] = "module"
projects[views_send][version] = "1.0-alpha1"
projects[views_send][subdir] = "contrib"

projects[views_data_export][type] = "module"
projects[views_data_export][version] = "3.0-beta6"
projects[views_data_export][subdir] = "contrib"

projects[views_bulk_operations][type] = "module"
projects[views_bulk_operations][version] = "3.1"
projects[views_bulk_operations][subdir] = "contrib"

projects[webform][type] = "module"
projects[webform][version] = "3.19"
projects[webform][subdir] = "contrib"

; Commons Contrib modules
projects[commons_wysiwyg][type] = "module"
projects[commons_wysiwyg][version] = "3.1"
projects[commons_wysiwyg][subdir] = "contrib"

projects[commons_profile_base][type] = "module"
projects[commons_profile_base][version] = "3.x-dev"
projects[commons_profile_base][subdir] = "contrib"

; Themes
projects[adaptivetheme][type] = "theme"
projects[adaptivetheme][version] = "3.1"
projects[adaptivetheme][subdir] = "contrib"

projects[sky][type] = "theme"
projects[sky][version] = "3.0-rc1"
projects[sky][subdir] = "contrib"

; Git sourced Modules
projects[cod_support][type] = "module"
projects[cod_support][subdir] = "contrib"
projects[cod_support][download][type] = "git"
projects[cod_support][download][url] = "http://git.drupal.org/project/cod_support.git"
projects[cod_support][download][branch] = "7.x-1.x"

projects[admin_icons][type] = "module"
projects[admin_icons][subdir] = "contrib"
projects[admin_icons][download][type] = "git"
projects[admin_icons][download][url] = "http://git.drupal.org/project/admin_icons.git"
projects[admin_icons][download][branch] = "7.x-1.x"

projects[registration][type] = "module"
projects[registration][subdir] = "contrib"
projects[registration][download][type] = "git"
projects[registration][download][url] = "http://git.drupal.org/project/registration.git"
projects[registration][download][branch] = "7.x-1.x"

projects[uuid][type] = "module"
projects[uuid][subdir] = "contrib"
projects[uuid][download][type] = "git"
projects[uuid][download][url] = "http://git.drupal.org/project/uuid.git"
projects[uuid][download][branch] = "7.x-1.x"

projects[uuid_features][type] = "module"
projects[uuid_features][subdir] = "contrib"
projects[uuid_features][download][type] = "git"
projects[uuid_features][download][url] = "http://git.drupal.org/project/uuid_features.git"
projects[uuid_features][download][branch] = "7.x-1.x"

; Libraries
libraries[ckeditor][download][type] = "get"
libraries[ckeditor][download][url] = "http://download.cksource.com/CKEditor/CKEditor/CKEditor%204.0/ckeditor_4.0_standard.tar.gz"
libraries[ckeditor][type] = "libraries"