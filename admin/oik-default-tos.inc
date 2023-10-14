<?php // (C) Copyright Business Link 2012, 2013 (C) Bobbing Wide 2013

/** 
 * Return an array of the text for each of the different selectable parts of the Terms of service/Terms and Conditions
 * 
 * The text was extracted from "Sample_terms_and_conditions_of_website_usage5.doc", downloaded on 2013/10/13
 * @link http://www.nibusinessinfo.co.uk/Growth_and_Innovation_files/Sample_terms_and_conditions_of_website_usage5.doc
 *
 * @TODO Need to cater for all variables within [] e.g. 
 *
 * [company registration number and place of registration] 
 * - CRN in the UK @link https://online.hmrc.gov.uk/information/help?helpcategory=security&affinitygroup=&helpid=crn
 * - "Registered address"   @link http://en.wikipedia.org/wiki/Registered_office
 * 
 * [insert list of information]
 * this probably only applies to Category 3 / 4 cookies
 *
 * 
 * @return array $text - localized text for ToS / T's and C's 
 *
 */ 
function oik_default_tos() {
  $text = array();
  $text['welcome'] = __( "<p>Welcome to our website.</p>", "oik-tos" ); 
  $text['welcome'] .= __("<p>If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern [bw_company]'s relationship with you in relation to this website.</p>", "oik-tos" );
  $text['disagree'] = __( "If you disagree with any part of these terms and conditions, please do not use our website.", "oik-tos" );
  $text['definitions'] = __( "The term '[bw_company]' or 'us' or 'we' refers to the owner of the website whose registered office is [bw_address].", "oik-tos" ); 
  $text['definitions'] .= __( "Our company registration number is [company registration number and place of registration].", "oik-tos" ); 
  $text['definitions'] .= __( "The term 'you' refers to the user or viewer of our website.", "oik-tos" );
  $text['intro'] = __( "<p>The use of this website is subject to the following terms of use:</p>", "oik-tos" );
  $text['intro-list'] = "<ul>";
  $text['content'] =  __( "<li>The content of the pages of this website is for your general information and use only.</li>", "oik-tos" ); 
  $text['subjecttochange'] = __( "<li>It is subject to change without notice.</li>", "oik-tos" );
  $text['cookies'] = __( "<li>This website uses cookies to monitor browsing preferences.</li>", "oik-tos" );
  $text['cookies-tbc'] = __( "<li>If you do allow cookies to be used, the following personal information may be stored by us for use by third parties:</li>", "oik-tos" ); 
  // $text['cookies-tbc'] .= __( "[insert list of information]", "oik-tos" );
  $text['nowarranty'] = __( "<li>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</li>", "oik-tos" );
  $text['noliability'] = __( "<li>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable.</li>", "oik-tos" ); 
  $text['responsibility'] = __( "<li>It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</li>", "oik-tos" );
  $text['ownershp'] = __( "<li>This website contains material which is owned by or licensed to us.</li>", "oik-tos" );
  $text['material'] = __( "<li>This material includes, but is not limited to, the design, layout, look, appearance and graphics.</li>", "oik-tos" );
  $text['reproduction'] = __( "<li>Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</li>", "oik-tos" );
  $text['trademarks'] = __( "<li>All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.</li>", "oik-tos" );
  $text['unauthorised-use'] = __( "<li>Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.</li>", "oik-tos" );
  $text['links'] = "<li>";
  $text['links'] .= __( "From time to time, this website may also include links to other websites. ", "oik-tos" );
  $text['links'] .= __( "These links are provided for your convenience to provide further information. ", "oik-tos" );
  $text['links'] .= __( "They do not signify that we endorse the website(s). ", "oik-tos" );
  $text['links'] .= __( "We have no responsibility for the content of the linked website(s).", "oik-tos" );
  $text['links'] .= "</li>";
  // $text['link-consent'] = __( "<li>You may not create a link to this website from another website or document without [bw_company]'s prior written consent.</li>", "oik-tos" );
  $text['local-laws-UK'] = __( "<li>Your use of this website and any dispute arising out of such use of the website is subject to the laws of England, Northern Ireland, Scotland and Wales.</li>" , "oik-tos" );
  /**
   Possible variations - which could be built with oik-options.
   
  $text['local-laws-US-New-Jersey'] = __( "Governing Law", "oik-tos" );
  $text['local-laws-US-New-Jersey'] .= __( "This Agreement is governed in accordance with the laws of New Jersey, United States." ); 
  */
  $text['intro-end-list'] = "</ul>";

  $text['effdate'] = sprintf( __( '<p>These terms of service are effective from %1$s</p>', "oik-tos" ), bw_format_date( null, "F Y") );
  $text['copyright'] = __( "[bw_copyright]", "oik-tos" );
  
  // eCommerce stuff should go here
  $text['payment']  = __( "<h3>Payment</h3>", "oik-tos" );
  $text['payment'] .= __( "All payments are due upon receipt. ", "oik-tos" );
  $text['payment'] .= __( "If a payment is not received or payment method is declined, the buyer forfeits the ownership of any items purchased. ", "oik-tos" );
  $text['payment'] .= __( "If no payment is received, no items will be shipped. ", "oik-tos" );

  $text['shipping']  = __( "<h3>Shipping Policies</h3>", "oik-tos" );
  $text['shipping-payment'] .= __( "Shipping will be paid for by the buyer in the amount agreed upon by the seller at the time of purchase. ", "oik-tos" );
  $text['shipping-loss'] .= __( "If an item is lost during shipping, the total cost of item, including shipping, will be refunded to the buyer by the seller. ", "oik-tos" );
  $text['shipping-international'] .= __( "Shipping costs may double if shipping internationally. ", "oik-tos" );
  $text['shipping-damage'] .= __( "If an item is damaged during shipping, seller will not be held responsible. ", "oik-tos" );
  
  /* 


Refund/Return Policy

Items are entitled to be refunded or returned based on complaint. 
If an item is damaged during shipping, a replacement item will be sent free of charge. 
If an item is unsatisfactory, a written explanation is needed before the item may be considered for a refund. 
Buyer must take into account the description of the item before requesting a refund. 
If the item matches the description by the seller and the buyer is unsatisfied, seller is not responsible for refund. 
Exchanges are granted on a case-by-case basis.

Cancellation

An item may be cancelled up until payment has been processed. 
Once payment has been processed, the buyer is responsible for payment.

Complaints

Any complaints about items or sellers may be sent to our support team: [bw_email] or [bw_telephone]
There is no guarantee of a resolution. 
Each case will be looked at individually, and the seller will be in contact as well.

Legalities

The seller is not responsible for any health or safety concerns once the buyer has received the item. 
If any harm is incurred from the items purchased by the buyer, the seller shares no responsibility.
These terms and conditions are subject to change.
*/  

  return( $text );
}

/**
 * Return the labels for each for each of the fields
 * 
 * Note: For any field that doesn't have a label then we default to the ucfirst version
 * @TODO so this should be completed for i18n/l10n purposes
 */
function oik_tos_labels() {
 $titles = array();
 $titles['welcome'] = __( "Welcome", "oik-tos" ); 
 $titles['disagree'] = __( "Disagree", "oik-tos" ); 
 $titles['definitions'] = __( "Definitions", "oik-tos" ); 
 $titles['intro'] = __( "Introduction", "oik-tos" );
 $titles['content'] = __( "Content", "oik-tos" );
 $titles['subjecttochange'] = __( "Subject to change", "oik-tos" );
 return( $titles );
} 


      		
