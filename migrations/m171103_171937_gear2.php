<?php

/**
 * @copyright Copyright (C) 2015-2017 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

use app\components\db\Migration;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class m171103_171937_gear2 extends Migration
{
    public function safeUp()
    {
        $t = $this->getList('gear_type');
        $b = $this->getList('brand2');
        $a = $this->getList('ability2');
        $this->batchInsert(
            'gear2',
            ['key', 'name', 'type_id', 'brand_id', 'ability_id'],
            [
                ['18k_aviators', '18K Aviators', $t->headgear, $b->rockenberg, $a->last_ditch_effort],
                ['annaki_beret', 'Annaki Beret', $t->headgear, $b->annaki, $a->ink_resistance_up],
                ['annaki_mask', 'Annaki Mask', $t->headgear, $b->annaki, $a->opening_gambit],
                ['armor_helmet_replica', 'Armor Helmet Replica', $t->headgear, $b->cuttlegear, $a->tenacity],
                ['backwards_cap', 'Backwards Cap', $t->headgear, $b->zekko, $a->quick_respawn],
                ['bamboo_hat', 'Bamboo Hat', $t->headgear, $b->inkline, $a->ink_saver_main],
                ['bike_helmet', 'Bike Helmet', $t->headgear, $b->skalop, $a->ink_recovery_up],
                ['blowfish_bell_hat', 'Blowfish Bell Hat', $t->headgear, $b->firefin, $a->ink_recovery_up],
                ['bobble_hat', 'Bobble Hat', $t->headgear, $b->splash_mob, $a->quick_super_jump],
                ['bucket_hat', 'Bucket Hat', $t->headgear, $b->squidforce, $a->special_saver],
                ['camo_mesh', 'Camo Mesh', $t->headgear, $b->firefin, $a->swim_speed_up],
                ['camping_hat', 'Camping Hat', $t->headgear, $b->inkline, $a->special_power_up],
                ['cycle_king_cap', 'Cycle King Cap', $t->headgear, $b->tentatek, $a->bomb_defense_up],
                ['dust_blocker_2000', 'Dust Blocker 2000', $t->headgear, $b->grizzco, null],
                ['fake_contacts', 'Fake Contacts', $t->headgear, $b->tentatek, $a->special_charge_up],
                ['firefin_facemask', 'Firefin Facemask', $t->headgear, $b->firefin, $a->run_speed_up],
                ['fishfry_visor', 'FishFry Visor', $t->headgear, $b->firefin, $a->special_charge_up],
                ['five_panel_cap', 'Five-Panel Cap', $t->headgear, $b->zekko, $a->comeback],
                ['half_rim_glasses', 'Half-Rim Glasses', $t->headgear, $b->splash_mob, $a->special_power_up],
                ['headlamp_helmet', 'Headlamp Helmet', $t->headgear, $b->grizzco, null],
                ['hero_headphones_replica', 'Hero Headphones Replica', $t->headgear, $b->cuttlegear, $a->special_saver],
                ['hero_headset_replica', 'Hero Headset Replica', $t->headgear, $b->cuttlegear, $a->run_speed_up],
                ['hickory_work_cap', 'Hickory Work Cap', $t->headgear, $b->krak_on, $a->special_power_up],
                ['hockey_helmet', 'Hockey Helmet', $t->headgear, $b->forge, $a->cold_blooded],
                ['jellyvader_cap', 'Jellyvader Cap', $t->headgear, $b->skalop, $a->ink_saver_sub],
                ['king_facemask', 'King Facemask', $t->headgear, $b->enperry, $a->ink_saver_sub],
                ['king_flip_mesh', 'King Flip Mesh', $t->headgear, $b->enperry, $a->run_speed_up],
                ['knitted_hat', 'Knitted Hat', $t->headgear, $b->firefin, $a->ink_resistance_up],
                ['lightweight_cap', 'Lightweight Cap', $t->headgear, $b->inkline, $a->swim_speed_up],
                ['mtb_helmet', 'MTB Helmet', $t->headgear, $b->zekko, $a->tenacity],
                ['noise_cancelers', 'Noise Cancelers', $t->headgear, $b->forge, $a->quick_respawn],
                ['paintball_mask', 'Paintball Mask', $t->headgear, $b->forge, $a->comeback],
                ['painter_s_mask', 'Painter\'s Mask', $t->headgear, $b->squidforce, $a->cold_blooded],
                ['patched_hat', 'Patched Hat', $t->headgear, $b->skalop, $a->cold_blooded],
                ['pilot_goggles', 'Pilot Goggles', $t->headgear, $b->forge, $a->sub_power_up],
                ['power_mask', 'Power Mask', $t->headgear, $b->amiibo, $a->bomb_defense_up],
                ['power_mask_mk_i', 'Power Mask Mk I', $t->headgear, $b->amiibo, $a->ink_resistance_up],
                ['retro_specs', 'Retro Specs', $t->headgear, $b->splash_mob, $a->quick_respawn],
                ['safari_hat', 'Safari Hat', $t->headgear, $b->forge, $a->last_ditch_effort],
                ['samurai_helmet', 'Samurai Helmet', $t->headgear, $b->amiibo, $a->quick_super_jump],
                ['skull_bandana', 'Skull Bandana', $t->headgear, $b->forge, $a->special_saver],
                ['snorkel_mask', 'Snorkel Mask', $t->headgear, $b->forge, $a->ink_saver_sub],
                ['soccer_headband', 'Soccer Headband', $t->headgear, $b->tentatek, $a->tenacity],
                ['special_forces_beret', 'Special Forces Beret', $t->headgear, $b->forge, $a->opening_gambit],
                ['squash_headband', 'Squash Headband', $t->headgear, $b->zink, $a->special_saver],
                ['squid_clip_ons', 'Squid Clip-Ons', $t->headgear, $b->amiibo, $a->opening_gambit],
                ['squid_facemask', 'Squid Facemask', $t->headgear, $b->squidforce, $a->ink_saver_main],
                ['squid_hairclip', 'Squid Hairclip', $t->headgear, $b->amiibo, $a->swim_speed_up],
                ['squidfin_hook_cans', 'Squidfin Hook Cans', $t->headgear, $b->forge, $a->ink_resistance_up],
                ['squidvader_cap', 'Squidvader Cap', $t->headgear, $b->skalop, $a->special_charge_up],
                ['squinja_mask', 'Squinja Mask', $t->headgear, $b->amiibo, $a->quick_respawn],
                ['straw_boater', 'Straw Boater', $t->headgear, $b->skalop, $a->quick_super_jump],
                ['striped_beanie', 'Striped Beanie', $t->headgear, $b->splash_mob, $a->opening_gambit],
                ['studio_headphones', 'Studio Headphones', $t->headgear, $b->forge, $a->ink_saver_main],
                ['sun_visor', 'Sun Visor', $t->headgear, $b->tentatek, $a->sub_power_up],
                ['takoroka_mesh', 'Takoroka Mesh', $t->headgear, $b->takoroka, $a->bomb_defense_up],
                ['takoroka_visor', 'Takoroka Visor', $t->headgear, $b->takoroka, $a->quick_super_jump],
                ['tennis_headband', 'Tennis Headband', $t->headgear, $b->tentatek, $a->comeback],
                ['tinted_shades', 'Tinted Shades', $t->headgear, $b->zekko, $a->last_ditch_effort],
                ['urchins_cap', 'Urchins Cap', $t->headgear, $b->skalop, $a->sub_power_up],
                ['visor_skate_helmet', 'Visor Skate Helmet', $t->headgear, $b->skalop, $a->last_ditch_effort],
                ['white_headband', 'White Headband', $t->headgear, $b->squidforce, $a->ink_recovery_up],
                ['anchor_life_vest', 'Anchor Life Vest', $t->clothing, $b->grizzco, null],
                ['anchor_sweat', 'Anchor Sweat', $t->clothing, $b->squidforce, $a->cold_blooded],
                ['annaki_drive_tee', 'Annaki Drive Tee', $t->clothing, $b->annaki, $a->thermal_ink],
                ['annaki_evolution_tee', 'Annaki Evolution Tee', $t->clothing, $b->annaki, $a->respawn_punisher],
                ['armor_jacket_replica', 'Armor Jacket Replica', $t->clothing, $b->cuttlegear, $a->special_charge_up],
                ['b_ball_jersey_away', 'B-ball Jersey (Away)', $t->clothing, $b->zink, $a->ink_saver_sub],
                ['baby_jelly_shirt', 'Baby-Jelly Shirt', $t->clothing, $b->splash_mob, $a->bomb_defense_up],
                ['baby_jelly_shirt_tie', 'Baby-Jelly Shirt & Tie', $t->clothing, $b->splash_mob, $a->cold_blooded],
                ['basic_tee', 'Basic Tee', $t->clothing, $b->squidforce, $a->quick_respawn],
                ['berry_ski_jacket', 'Berry Ski Jacket', $t->clothing, $b->inkline, $a->special_power_up],
                ['birded_corduroy_jacket', 'Birded Corduroy Jacket', $t->clothing, $b->zekko, $a->run_speed_up],
                ['black_inky_rider', 'Black Inky Rider', $t->clothing, $b->rockenberg, $a->sub_power_up],
                ['black_ls', 'Black LS', $t->clothing, $b->zekko, $a->quick_super_jump],
                ['black_squideye', 'Black Squideye', $t->clothing, $b->tentatek, $a->run_speed_up],
                ['black_tee', 'Black Tee', $t->clothing, $b->squidforce, $a->special_power_up],
                ['black_urchin_rock_tee', 'Black Urchin Rock Tee', $t->clothing, $b->rockenberg, $a->ink_recovery_up],
                ['black_v_neck_tee', 'Black V-Neck Tee', $t->clothing, $b->squidforce, $a->thermal_ink],
                ['blue_peaks_tee', 'Blue Peaks Tee', $t->clothing, $b->inkline, $a->ink_saver_sub],
                ['blue_sailor_suit', 'Blue Sailor Suit', $t->clothing, $b->forge, $a->sub_power_up],
                ['blue_tentatek_tee', 'Blue Tentatek Tee', $t->clothing, $b->tentatek, $a->quick_respawn],
                ['brown_fa_11_bomber', 'Brown FA-11 Bomber', $t->clothing, $b->forge, $a->bomb_defense_up],
                ['camo_zip_hoodie', 'Camo Zip Hoodie', $t->clothing, $b->firefin, $a->quick_respawn],
                ['chilly_mountain_coat', 'Chilly Mountain Coat', $t->clothing, $b->inkline, $a->swim_speed_up],
                ['chirpy_chips_band_tee', 'Chirpy Chips Band Tee', $t->clothing, $b->rockenberg, $a->cold_blooded],
                ['choco_layered_ls', 'Choco Layered LS', $t->clothing, $b->takoroka, $a->ink_saver_sub],
                ['crimson_parashooter', 'Crimson Parashooter', $t->clothing, $b->annaki, $a->special_charge_up],
                ['juice_parka', 'Juice Parka', $t->clothing, $b->grizzco, null],
                ['cycle_king_jersey', 'Cycle King Jersey', $t->clothing, $b->tentatek, $a->bomb_defense_up],
                ['dark_urban_vest', 'Dark Urban Vest', $t->clothing, $b->firefin, $a->cold_blooded],
                ['eggplant_mountain_coat', 'Eggplant Mountain Coat', $t->clothing, $b->inkline, $a->special_saver],
                ['fa_01_jacket', 'FA-01 Jacket', $t->clothing, $b->forge, $a->ink_recovery_up],
                ['fa_01_reversed', 'FA-01 Reversed', $t->clothing, $b->forge, $a->quick_super_jump],
                ['fc_albacore', 'FC Albacore', $t->clothing, $b->takoroka, $a->respawn_punisher],
                ['fugu_tee', 'Fugu Tee', $t->clothing, $b->firefin, $a->swim_speed_up],
                ['grape_hoodie', 'Grape Hoodie', $t->clothing, $b->enperry, $a->quick_respawn],
                ['gray_8_bit_fishfry', 'Gray 8-Bit FishFry', $t->clothing, $b->firefin, $a->special_charge_up],
                ['gray_fa_11_bomber', 'Gray FA-11 Bomber', $t->clothing, $b->forge, $a->cold_blooded],
                ['gray_hoodie', 'Gray Hoodie', $t->clothing, $b->skalop, $a->sub_power_up],
                ['green_tee', 'Green Tee', $t->clothing, $b->forge, $a->special_saver],
                [
                    'green_v_neck_limited_tee',
                    'Green V-Neck Limited Tee',
                    $t->clothing,
                    $b->squidforce,
                    $a->quick_super_jump,
                ],
                ['green_check_shirt', 'Green-Check Shirt', $t->clothing, $b->zekko, $a->sub_power_up],
                ['half_sleeve_sweater', 'Half-Sleeve Sweater', $t->clothing, $b->toni_kensa, $a->ink_saver_sub],
                ['hero_hoodie_replica', 'Hero Hoodie Replica', $t->clothing, $b->cuttlegear, $a->ink_recovery_up],
                ['hero_jacket_replica', 'Hero Jacket Replica', $t->clothing, $b->cuttlegear, $a->swim_speed_up],
                ['hightide_era_band_tee', 'Hightide Era Band Tee', $t->clothing, $b->rockenberg, $a->thermal_ink],
                ['hula_punk_shirt', 'Hula Punk Shirt', $t->clothing, $b->annaki, $a->ink_saver_main],
                ['inkfall_shirt', 'Inkfall Shirt', $t->clothing, $b->toni_kensa, $a->special_charge_up],
                ['inkopolis_squaps_jersey', 'Inkopolis Squaps Jersey', $t->clothing, $b->zink, $a->cold_blooded],
                ['king_jersey', 'King Jersey', $t->clothing, $b->enperry, $a->respawn_punisher],
                ['layered_anchor_ls', 'Layered Anchor LS', $t->clothing, $b->squidforce, $a->run_speed_up],
                ['layered_vector_ls', 'Layered Vector LS', $t->clothing, $b->takoroka, $a->special_saver],
                [
                    'lime_easy_stripe_shirt',
                    'Lime Easy-Stripe Shirt',
                    $t->clothing,
                    $b->splash_mob,
                    $a->ink_resistance_up,
                ],
                ['logo_aloha_shirt', 'Logo Aloha Shirt', $t->clothing, $b->zekko, $a->ink_recovery_up],
                ['matcha_down_jacket', 'Matcha Down Jacket', $t->clothing, $b->inkline, $a->ninja_squid],
                ['mint_tee', 'Mint Tee', $t->clothing, $b->skalop, $a->bomb_defense_up],
                ['mister_shrug_tee', 'Mister Shrug Tee', $t->clothing, $b->krak_on, $a->ink_resistance_up],
                ['navy_deca_logo_tee', 'Navy Deca Logo Tee', $t->clothing, $b->zink, $a->ink_saver_main],
                ['navy_king_tank', 'Navy King Tank', $t->clothing, $b->enperry, $a->ink_resistance_up],
                ['navy_striped_ls', 'Navy Striped LS', $t->clothing, $b->splash_mob, $a->ink_recovery_up],
                ['negative_longcuff_sweater', 'Negative Longcuff Sweater', $t->clothing, $b->toni_kensa, $a->haunt],
                ['octobowler_shirt', 'Octobowler Shirt', $t->clothing, $b->krak_on, $a->ink_saver_main],
                [
                    'pink_easy_stripe_shirt',
                    'Pink Easy-Stripe Shirt',
                    $t->clothing,
                    $b->splash_mob,
                    $a->quick_super_jump,
                ],
                [
                    'positive_longcuff_sweater',
                    'Positive Longcuff Sweater',
                    $t->clothing,
                    $b->toni_kensa,
                    $a->swim_speed_up,
                ],
                ['power_armor', 'Power Armor', $t->clothing, $b->amiibo, $a->quick_respawn],
                ['power_armor_mk_i', 'Power Armor Mk I', $t->clothing, $b->amiibo, $a->ink_resistance_up],
                ['prune_parashooter', 'Prune Parashooter', $t->clothing, $b->annaki, $a->ninja_squid],
                ['pullover_coat', 'Pullover Coat', $t->clothing, $b->toni_kensa, $a->thermal_ink],
                ['purple_camo_ls', 'Purple Camo LS', $t->clothing, $b->takoroka, $a->sub_power_up],
                ['red_tentatek_tee', 'Red Tentatek Tee', $t->clothing, $b->tentatek, $a->swim_speed_up],
                ['red_v_neck_limited_tee', 'Red V-Neck Limited Tee', $t->clothing, $b->squidforce, $a->quick_respawn],
                ['red_vector_tee', 'Red Vector Tee', $t->clothing, $b->takoroka, $a->ink_saver_main],
                ['reel_sweat', 'Reel Sweat', $t->clothing, $b->zekko, $a->special_power_up],
                ['retro_sweat', 'Retro Sweat', $t->clothing, $b->squidforce, $a->bomb_defense_up],
                ['sailor_stripe_tee', 'Sailor-Stripe Tee', $t->clothing, $b->splash_mob, $a->run_speed_up],
                ['samurai_jacket', 'Samurai Jacket', $t->clothing, $b->amiibo, $a->special_charge_up],
                ['school_cardigan', 'School Cardigan', $t->clothing, $b->amiibo, $a->run_speed_up],
                ['school_uniform', 'School Uniform', $t->clothing, $b->amiibo, $a->ink_recovery_up],
                ['shirt_tie', 'Shirt & Tie', $t->clothing, $b->splash_mob, $a->special_saver],
                [
                    'shirt_with_blue_hoodie',
                    'Shirt with Blue Hoodie',
                    $t->clothing,
                    $b->splash_mob,
                    $a->special_power_up,
                ],
                ['short_knit_layers', 'Short Knit Layers', $t->clothing, $b->toni_kensa, $a->ink_saver_main],
                ['shrimp_pink_polo', 'Shrimp-Pink Polo', $t->clothing, $b->splash_mob, $a->ninja_squid],
                ['slash_king_tank', 'Slash King Tank', $t->clothing, $b->enperry, $a->thermal_ink],
                ['slipstream_united', 'Slipstream United', $t->clothing, $b->takoroka, $a->bomb_defense_up],
                ['splatfest_tee', 'Splatfest Tee', $t->clothing, $b->squidforce, $a->ability_doubler],
                ['squid_satin_jacket', 'Squid Satin Jacket', $t->clothing, $b->zekko, $a->quick_respawn],
                ['squid_squad_band_tee', 'Squid Squad Band Tee', $t->clothing, $b->rockenberg, $a->ink_resistance_up],
                ['squiddor_polo', 'Squiddor Polo', $t->clothing, $b->grizzco, null],
                ['squinja_suit', 'Squinja Suit', $t->clothing, $b->amiibo, $a->special_saver],
                ['sunny_day_tee', 'Sunny-Day Tee', $t->clothing, $b->krak_on, $a->special_charge_up],
                ['takoroka_windcrusher', 'Takoroka Windcrusher', $t->clothing, $b->takoroka, $a->cold_blooded],
                ['urchins_jersey', 'Urchins Jersey', $t->clothing, $b->zink, $a->run_speed_up],
                ['varsity_jacket', 'Varsity Jacket', $t->clothing, $b->zekko, $a->ink_saver_sub],
                ['vintage_check_shirt', 'Vintage Check Shirt', $t->clothing, $b->rockenberg, $a->haunt],
                ['wet_floor_band_tee', 'Wet Floor Band Tee', $t->clothing, $b->rockenberg, $a->swim_speed_up],
                ['white_8_bit_fishfry', 'White 8-Bit FishFry', $t->clothing, $b->firefin, $a->sub_power_up],
                ['white_anchor_tee', 'White Anchor Tee', $t->clothing, $b->squidforce, $a->ninja_squid],
                ['white_baseball_ls', 'White Baseball LS', $t->clothing, $b->rockenberg, $a->quick_super_jump],
                ['white_deca_logo_tee', 'White Deca Logo Tee', $t->clothing, $b->zink, $a->ink_resistance_up],
                ['white_inky_rider', 'White Inky Rider', $t->clothing, $b->rockenberg, $a->special_power_up],
                ['white_king_tank', 'White King Tank', $t->clothing, $b->enperry, $a->haunt],
                ['white_tee', 'White Tee', $t->clothing, $b->squidforce, $a->ink_saver_sub],
                ['white_urchin_rock_tee', 'White Urchin Rock Tee', $t->clothing, $b->rockenberg, $a->ink_saver_main],
                ['white_v_neck_tee', 'White V-Neck Tee', $t->clothing, $b->squidforce, $a->special_saver],
                ['yellow_layered_ls', 'Yellow Layered LS', $t->clothing, $b->squidforce, $a->quick_super_jump],
                ['yellow_urban_vest', 'Yellow Urban Vest', $t->clothing, $b->firefin, $a->haunt],
                ['zekko_baseball_ls', 'Zekko Baseball LS', $t->clothing, $b->zekko, $a->bomb_defense_up],
                ['zekko_hoodie', 'Zekko Hoodie', $t->clothing, $b->zekko, $a->ninja_squid],
                ['zekko_jade_coat', 'Zekko Jade Coat', $t->clothing, $b->zekko, $a->respawn_punisher],
                ['zekko_redleaf_coat', 'Zekko Redleaf Coat', $t->clothing, $b->zekko, $a->haunt],
                ['zink_layered_ls', 'Zink Layered LS', $t->clothing, $b->zink, $a->respawn_punisher],
                ['acerola_rain_boots', 'Acerola Rain Boots', $t->shoes, $b->inkline, $a->run_speed_up],
                ['armor_boot_replicas', 'Armor Boot Replicas', $t->shoes, $b->cuttlegear, $a->ink_saver_main],
                ['arrow_pull_ons', 'Arrow Pull-Ons', $t->shoes, $b->toni_kensa, $a->drop_roller],
                ['birch_climbing_shoes', 'Birch Climbing Shoes', $t->shoes, $b->inkline, $a->special_charge_up],
                ['black_dakroniks', 'Black Dakroniks', $t->shoes, $b->zink, $a->cold_blooded],
                ['black_flip_flops', 'Black Flip-Flops', $t->shoes, $b->zekko, $a->object_shredder],
                ['black_norimaki_750s', 'Black Norimaki 750s', $t->shoes, $b->tentatek, $a->special_charge_up],
                ['black_trainers', 'Black Trainers', $t->shoes, $b->tentatek, $a->quick_respawn],
                ['blue_black_squidkid_iv', 'Blue & Black Squidkid IV', $t->shoes, $b->enperry, $a->quick_super_jump],
                ['blue_moto_boots', 'Blue Moto Boots', $t->shoes, $b->rockenberg, $a->ink_resistance_up],
                ['blue_slip_ons', 'Blue Slip-Ons', $t->shoes, $b->krak_on, $a->sub_power_up],
                ['blueberry_casuals', 'Blueberry Casuals', $t->shoes, $b->krak_on, $a->ink_saver_sub],
                ['canary_trainers', 'Canary Trainers', $t->shoes, $b->tentatek, $a->quick_super_jump],
                ['cherry_kicks', 'Cherry Kicks', $t->shoes, $b->rockenberg, $a->stealth_jump],
                ['choco_clogs', 'Choco Clogs', $t->shoes, $b->krak_on, $a->quick_respawn],
                ['crazy_arrows', 'Crazy Arrows', $t->shoes, $b->takoroka, $a->stealth_jump],
                ['cream_basics', 'Cream Basics', $t->shoes, $b->krak_on, $a->special_saver],
                ['fringed_loafers', 'Fringed Loafers', $t->shoes, $b->amiibo, $a->cold_blooded],
                ['gold_hi_horses', 'Gold Hi-Horses', $t->shoes, $b->zink, $a->run_speed_up],
                ['gray_sea_slug_hi_tops', 'Gray Sea-Slug Hi-Tops', $t->shoes, $b->tentatek, $a->bomb_defense_up],
                ['hero_runner_replicas', 'Hero Runner Replicas', $t->shoes, $b->cuttlegear, $a->quick_super_jump],
                ['hero_snowboots_replicas', 'Hero Snowboots Replicas', $t->shoes, $b->cuttlegear, $a->ink_saver_sub],
                ['hunter_hi_tops', 'Hunter Hi-Tops', $t->shoes, $b->krak_on, $a->ink_recovery_up],
                ['hunting_boots', 'Hunting Boots', $t->shoes, $b->splash_mob, $a->bomb_defense_up],
                ['kid_clams', 'Kid Clams', $t->shoes, $b->rockenberg, $a->special_power_up],
                ['le_soccer_shoes', 'LE Soccer Shoes', $t->shoes, $b->takoroka, $a->ink_resistance_up],
                ['mawcasins', 'Mawcasins', $t->shoes, $b->splash_mob, $a->ink_recovery_up],
                ['mint_dakroniks', 'Mint Dakroniks', $t->shoes, $b->zink, $a->drop_roller],
                ['moto_boots', 'Moto Boots', $t->shoes, $b->rockenberg, $a->quick_respawn],
                ['neon_delta_straps', 'Neon Delta Straps', $t->shoes, $b->inkline, $a->sub_power_up],
                ['neon_sea_slugs', 'Neon Sea Slugs', $t->shoes, $b->tentatek, $a->ink_resistance_up],
                ['orange_arrows', 'Orange Arrows', $t->shoes, $b->takoroka, $a->ink_saver_main],
                ['orca_hi_tops', 'Orca Hi-Tops', $t->shoes, $b->takoroka, $a->special_saver],
                ['oyster_clogs', 'Oyster Clogs', $t->shoes, $b->krak_on, $a->run_speed_up],
                ['pink_trainers', 'Pink Trainers', $t->shoes, $b->tentatek, $a->sub_power_up],
                ['piranha_moccasins', 'Piranha Moccasins', $t->shoes, $b->splash_mob, $a->stealth_jump],
                ['plum_casuals', 'Plum Casuals', $t->shoes, $b->krak_on, $a->object_shredder],
                ['power_boots', 'Power Boots', $t->shoes, $b->amiibo, $a->ink_saver_main],
                ['power_boots_mk_i', 'Power Boots Mk I', $t->shoes, $b->amiibo, $a->bomb_defense_up],
                ['pro_trail_boots', 'Pro Trail Boots', $t->shoes, $b->inkline, $a->ink_resistance_up],
                ['punk_blacks', 'Punk Blacks', $t->shoes, $b->rockenberg, $a->cold_blooded],
                ['punk_whites', 'Punk Whites', $t->shoes, $b->rockenberg, $a->special_charge_up],
                ['purple_hi_horses', 'Purple Hi-Horses', $t->shoes, $b->zink, $a->special_power_up],
                ['purple_sea_slugs', 'Purple Sea Slugs', $t->shoes, $b->tentatek, $a->run_speed_up],
                ['red_black_squidkid_iv', 'Red & Black Squidkid IV', $t->shoes, $b->enperry, $a->special_charge_up],
                ['red_hi_horses', 'Red Hi-Horses', $t->shoes, $b->zink, $a->ink_saver_main],
                ['red_mesh_sneakers', 'Red-Mesh Sneakers', $t->shoes, $b->tentatek, $a->special_power_up],
                ['roasted_brogues', 'Roasted Brogues', $t->shoes, $b->rockenberg, $a->bomb_defense_up],
                ['samurai_shoes', 'Samurai Shoes', $t->shoes, $b->amiibo, $a->special_power_up],
                ['school_shoes', 'School Shoes', $t->shoes, $b->amiibo, $a->ink_saver_sub],
                ['smoky_wingtips', 'Smoky Wingtips', $t->shoes, $b->rockenberg, $a->object_shredder],
                ['snow_delta_straps', 'Snow Delta Straps', $t->shoes, $b->inkline, $a->swim_speed_up],
                ['squinja_boots', 'Squinja Boots', $t->shoes, $b->amiibo, $a->swim_speed_up],
                ['strapping_reds', 'Strapping Reds', $t->shoes, $b->splash_mob, $a->ink_resistance_up],
                ['strapping_whites', 'Strapping Whites', $t->shoes, $b->splash_mob, $a->ink_saver_sub],
                ['sunny_climbing_shoes', 'Sunny Climbing Shoes', $t->shoes, $b->inkline, $a->special_saver],
                ['sunset_orca_hi_tops', 'Sunset Orca Hi-Tops', $t->shoes, $b->takoroka, $a->drop_roller],
                ['trail_boots', 'Trail Boots', $t->shoes, $b->inkline, $a->ink_recovery_up],
                ['white_kicks', 'White Kicks', $t->shoes, $b->rockenberg, $a->swim_speed_up],
                ['white_norimaki_750s', 'White Norimaki 750s', $t->shoes, $b->tentatek, $a->swim_speed_up],
                ['white_seahorses', 'White Seahorses', $t->shoes, $b->zink, $a->ink_recovery_up],
                ['yellow_mesh_sneakers', 'Yellow-Mesh Sneakers', $t->shoes, $b->tentatek, $a->cold_blooded],
            ],
        );
    }

    public function safeDown()
    {
        $this->delete('gear2');
    }

    public function getList(string $table): \stdClass
    {
        return (object)ArrayHelper::map(
            (new Query())->select(['id', 'key'])->from($table)->all(),
            'key',
            'id',
        );
    }
}
