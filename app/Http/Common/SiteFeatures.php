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
                    "value" => "no"
                ),
                array(
                    "description" => "Yes, I want my existing site re-built / re-designed",
                    "price" => 800,
                    "value" => "yes"
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
                    "value" => "cart_with_members_db"
                ),
                array(
                    "description" => "Catalogue Features for Product Organization (Tags, Categories, Type, etc.)",
                    "price" => 1000,
                    "value" => "catalogue_features"
                ),
                array(
                    "description" => "Ability to add, edit, or remove products on your own?",
                    "price" => 1000,
                    "value" => "managing_products"
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
                    "value" => "creator"
                ),
                array(
                    "description" => "No, I'll upload all the products myself.",
                    "price" => 1000,
                    "value" => "owner"
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
                    "value" => "1-10"
                ),
                array(
                    "description" => "11-50",
                    "price" => 1000,
                    "value" => "11-50"
                ),
                array(
                    "description" => "51-100",
                    "price" => 1000,
                    "value" => "51-100"
                ),
                array(
                    "description" => "101-500",
                    "price" => 1000,
                    "value" => "101-300"
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
                    "value" => "Up to 10"
                ),
                array(
                    "description" => "Up to 25",
                    "price" => 1000,
                    "value" => "Up to 25"
                ),
                array(
                    "description" => "Up to 50",
                    "price" => 1000,
                    "value" => "Up to 50"
                ),
                array(
                    "description" => "Up to 100",
                    "price" => 1000,
                    "value" => "Up to 100"
                ),
                array(
                    "description" => "Over 100",
                    "price" => 1000,
                    "value" => "Over 100"
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
                    "value" => "management_and_registration"
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
                    "value" => "1"
                ),
                array(
                    "description" => "2-50",
                    "price" => 1000,
                    "value" => "2-50"
                ),
                array(
                    "description" => "50+",
                    "price" => 1000,
                    "value" => "50+"
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
                    "value" => "advanced_search"
                ),
                array(
                    "description" => "Social Buttons linking to Profiles",
                    "price" => 1000,
                    "value" => "social_btn"
                ),
                array(
                    "description" => "Likeboxes",
                    "price" => 1000,
                    "value" => "likeboxes"
                ),
                array(
                    "description" => "Twitter or Facebook Social Feeds",
                    "price" => 1000,
                    "value" => "feeds"
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
                    "value" => "yes"
                ),
                array(
                    "description" => "We will need you to supply graphics",
                    "price" => 1000,
                    "value" => "no"
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
                    "value" => "yes"
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
                    "value" => "yes"
                ),
                array(
                    "description" => "No",
                    "price" => 1000,
                    "value" => "no"
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
                    "value" => "<1"
                ),
                array(
                    "description" => "2 Months",
                    "price" => 1000,
                    "value" => "2"
                ),
                array(
                    "description" => "3 Months",
                    "price" => 1000,
                    "value" => "3"
                ),
                array(
                    "description" => "Over 3 Months",
                    "price" => 1000,
                    "value" => ">3"
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
    
    
}