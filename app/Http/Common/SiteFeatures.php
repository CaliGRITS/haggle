<?php

namespace App\Http\Common;

class SiteFeatures {
    
    private function getBasicDetails()
    {
        $existing_site = array(
            "heading" => "Existing Site",
            "title" => "Is this for an existing site?",
            "options" => [
                array(
                    "description" => "No, this is for a brand-new site ",
                    "price" => 1000,
                    "value" => "existing_no"
                ),
                array(
                    "description" => "Yes, I want my existing site re-built / re-designed",
                    "price" => 800,
                    "value" => "existing_yes"
                )
            ]
        );
        return $existing_site;
    }
    
    private function getMainWebsiteFeatures(){
        $main_features = array(
            "heading" => "Main Website Features",
            "title" => "Select all that apply (very important)",
            "options" => [
                array(
                    "title" => "Ecommerce",
                    "description" => "Select this box if your website will have any kind of commerce, shopping, or sales capabilities.",
                    "price" => 1000,
                    "value" => "ecommerce"
                ),
                array(
                    "title" => "Informational",
                    "description" => "Select this box if your website will have static, informational pages (should be most sites).",
                    "price" => 1000,
                    "value" => "informational"
                ),
                array(
                    "title" => "Portfolio",
                    "description" => "Select this box if your website will have image galleries, portfolios, or photo pages (ex. modeling shoots, design portfolios, product galleries).",
                    "price" => 1000,
                    "value" => "portfolio"
                ),
                array(
                    "title" => "Blog",
                    "description" => "Select this box if your website will have a working blog, whether that's the primary focus or an addition to the site. We recommend blogs on all sites for a variety of reasons.",
                    "price" => 1000,
                    "value" => "blog"
                ),
                array(
                    "title" => "Community (Forum, Chat Room)",
                    "description" => "Select this box if your website will have an interactive forum, many blog authors that can sign up independent, or acts as a social community for multiple people.",
                    "price" => 1000,
                    "value" => "community"
                )
            ]
        );
        return $main_features;
    }
    
    private function getEcommercePaymentDetails()
    {
        $ecommerce_payment = array (
            "heading" => "Ecommerce Features",
            "title" => "By default, ecommerce websites include simple payment processing and a shopping cart. Please add any additional features below:",
            "options" => [
                array(
                    "description" => "Advanced Shopping Cart With Member Database (User's Have Accounts)",
                    "price" => 1000,
                    "value" => "ecommerce_cart_with_members_db"
                ),
                array(
                    "description" => "Catalogue Features for Product Organization (Tags, Categories, Type, etc.)",
                    "price" => 1000,
                    "value" => "ecommerce_catalogue_features"
                ),
                array(
                    "description" => "Ability to add, edit, or remove products on your own?",
                    "price" => 1000,
                    "value" => "ecommerce_managing_products"
                )
            ]
        );
        return $ecommerce_payment;
    }
    
    private function getEcommerceWhoUploadProducts()
    {
        $products_upload = array (
            "heading" => "Ecommerce Features",
            "title" => "Initially, do you want us to upload the products for you?",
            "options" => [
                array(
                    "description" => "Yes, please!",
                    "price" => 1000,
                    "value" => "ecommerce_creator"
                ),
                array(
                    "description" => "No, I'll upload all the products myself.",
                    "price" => 0,
                    "value" => "ecommerce_owner"
                )
            ]
        );
        
        return $products_upload;
    }
    
    private function getEcommerceProductQuantities()
    {
        $products_for_sell = array(
            "heading" => "Ecommerce Features",
            "title" => "How many products are you looking to sell?",
            "options" => [
                array(
                    "description" => "1-10",
                    "price" => 1000,
                    "value" => "ecommerce_1-10"
                ),
                array(
                    "description" => "11-50",
                    "price" => 1000,
                    "value" => "ecommerce_11-50"
                ),
                array(
                    "description" => "51-100",
                    "price" => 1000,
                    "value" => "ecommerce_51-100"
                ),
                array(
                    "description" => "101-500",
                    "price" => 1000,
                    "value" => "ecommerce_101-300"
                )
            ]
        );
        return $products_for_sell;
    }
    
    private function getPortfolioFeatures()
    {
        $portfolio_products = array(
            "heading" => "Portfolio Features",
            "title" => "How photos/images/portfolio items do you initially want on the website?",
            "options" => [
                array(
                    "description" => "Up to 10",
                    "price" => 1000,
                    "value" => "portfolio_Upto_10"
                ),
                array(
                    "description" => "Up to 25",
                    "price" => 1000,
                    "value" => "portfolio_Upto_25"
                ),
                array(
                    "description" => "Up to 50",
                    "price" => 1000,
                    "value" => "portfolio_Upto_50"
                ),
                array(
                    "description" => "Up to 100",
                    "price" => 1000,
                    "value" => "portfolio_Upto_100"
                ),
                array(
                    "description" => "Over 100",
                    "price" => 1000,
                    "value" => "portfolio_over_100"
                )
            ]
        );
        return $portfolio_products;
    }
    
    private function getBlogFeatures()
    {
        $blog_features = array (
            "heading" => "Blog Features",
            "title" => "Please select this option if member registration or user managemment is required",
            "options" => [
                array(
                    "description" => "User Management / Member Registration",
                    "price" => 1000,
                    "value" => "blog_management"
                )
            ]
        );
        
        return $blog_features;
    }
    
    private function getSizeOfSite()
    {
        $size_details = array (
            "heading" => "Size",
            "title" => "What is the size / approximate number of pages of the website?",
            "options" => [
                array(
                    "description" => "Landing Page (1)",
                    "price" => 1000,
                    "value" => "size_1"
                ),
                array(
                    "description" => "2-50",
                    "price" => 1000,
                    "value" => "size_2-50"
                ),
                array(
                    "description" => "50+",
                    "price" => 1000,
                    "value" => "size_above_50"
                ),
            ]
        );
        
        return $size_details;
    }
    
    private function getPublicSiteFeatures()
    {
        $public_site_features = array (
            "heading" => "Public Website Features",
            "title" => "Please choose social media related options",
            "options" => [
                array(
                    "description" => "Advanced Search (Search content by categories, types, or other advanced fields)",
                    "price" => 1000,
                    "value" => "public_advanced_search"
                ),
                array(
                    "description" => "Social Buttons linking to Profiles",
                    "price" => 1000,
                    "value" => "public_social_btn"
                ),
                array(
                    "description" => "Likeboxes",
                    "price" => 1000,
                    "value" => "public_likeboxes"
                ),
                array(
                    "description" => "Twitter or Facebook Social Feeds",
                    "price" => 1000,
                    "value" => "public_feeds"
                )
            ]
        );
        
        return $public_site_features;
    }
    
    private function getGraphicsFeatures()
    {
        $graphics_features = array (
            "heading" => "Graphics",
            "title" => "Will you be supplying graphics?",
            "options" => [
                array(
                    "description" => "Yes, we will supply all necessary graphics",
                    "price" => 1000,
                    "value" => "graphics_yes"
                ),
                array(
                    "description" => "We will need you to supply graphics",
                    "price" => 1000,
                    "value" => "graphics_no"
                )
            ]
        );
        
        return $graphics_features;
    }
    
    private function getLogoDetails()
    {
        $logo_details = array (
            "heading" => "Graphics",
            "title" => "Logo",
            "options" => [
                array(
                    "description" => "I need a new logo as well",
                    "price" => 1000,
                    "value" => "logo_yes"
                )
            ]
        );
        
        return $logo_details;
    }
    
    private function getSiteCOntent()
    {
        $site_content = array (
            "heading" => "Site Content",
            "title" => "Do you need us to write the content for your website?",
            "options" => [
                array(
                    "description" => "Yes",
                    "price" => 1000,
                    "value" => "site_content_yes"
                ),
                array(
                    "description" => "No",
                    "price" => 1000,
                    "value" => "site_content_no"
                )
            ]
        );
        
        return $site_content;
    }
    
    private function getTimeFrameDetails()
    {
        $time_frame = array (
            "heading" => "Timeframe",
            "title" => "What is your ideal completion timeframe?",
            "options" => [
                array(
                    "description" => "Less Than 1 Month",
                    "price" => 1000,
                    "value" => "timeframe_less_1"
                ),
                array(
                    "description" => "2 Months",
                    "price" => 1000,
                    "value" => "timeframe_2"
                ),
                array(
                    "description" => "3 Months",
                    "price" => 1000,
                    "value" => "timeframe_3"
                ),
                array(
                    "description" => "Over 3 Months",
                    "price" => 1000,
                    "value" => "timeframe_more_3"
                ),
            ]
        );
        
        return $time_frame;
    }
    
    public function getAllFeatures()
    {
        $existing_site = SiteFeatures::getBasicDetails();
        $main_features = SiteFeatures::getMainWebsiteFeatures();
        $ecommerce_payment = SiteFeatures::getEcommercePaymentDetails();
        $products_upload = SiteFeatures::getEcommerceWhoUploadProducts();
        $products_for_sell = SiteFeatures::getEcommerceProductQuantities();
        $portfolio_features = SiteFeatures::getPortfolioFeatures();
        $blog_features = SiteFeatures::getBlogFeatures();
        $size = SiteFeatures::getSizeOfSite();
        $public_site_features = SiteFeatures::getPublicSiteFeatures();
        $graphics_features = SiteFeatures::getGraphicsFeatures();
        $logo_details = SiteFeatures::getLogoDetails();
        $site_content = SiteFeatures::getSiteCOntent();
        $time_frame = SiteFeatures::getTimeFrameDetails();
        $all_features = array(
            "existing" => $existing_site,
            "main_features" => $main_features,
            "ecommerce_payment" => $ecommerce_payment,
            "ecommerce_products_upload" => $products_upload,
            "ecommerce_products_quantity" => $products_for_sell,
            "portfolio_features" => $portfolio_features,
            "blog_features" => $blog_features,
            "size" => $size,
            "public_site_features" => $public_site_features,
            "graphics_features" => $graphics_features,
            "logo_details" => $logo_details,
            "site_content" => $site_content,
            "time_frame" => $time_frame
        );
        return $all_features;
    }
    
    public function getFeature($type = NULL)
    {
        if ($type === "existing")
        {
            return SiteFeatures::getBasicDetails();
        }
        if ($type === "main-feature")
        {
            return SiteFeatures::getMainWebsiteFeatures();
        }
        if ($type === "ecommerce-payment")
        {
            return SiteFeatures::getEcommercePaymentDetails();
        }
        if ($type === "ecommerce-upload-products")
        {
            return SiteFeatures::getEcommerceWhoUploadProducts();
        }
        if ($type === "ecommerce-product-quantity")
        {
            return SiteFeatures::getEcommerceProductQuantities();
        }
        if ($type === "portfolio")
        {
            return SiteFeatures::getPortfolioFeatures();
        }
        if ($type === "blog")
        {
            return SiteFeatures::getBlogFeatures();
        }
        if ($type === "size")
        {
            return SiteFeatures::getSizeOfSite();
        }
        if ($type === "public-site")
        {
            return SiteFeatures::getPublicSiteFeatures();
        }
        if ($type === "graphics")
        {
            return SiteFeatures::getGraphicsFeatures();
        }
        if ($type === "logo")
        {
            return SiteFeatures::getLogoDetails();
        }
        if ($type === "site-content")
        {
            return SiteFeatures::getSiteCOntent();
        }
//        $feature_type = ($type === "existing") ? SiteFeatures::getBasicDetails() : [];
        return [];
    }
    
    
}