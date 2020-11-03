//=======Testimonial Like
function likeTestimonial(testoId, userId) {
    if (testoId != '' && userId != '') {
        jQuery.ajax({
            type: "POST",
            url: site_url + "home/likeTestimonial",
            data: {
                testoId: testoId,
                userId: userId,
            },
            cache: false,
            success: function(data) {
                var res = data.split('####');
                if (res[0] == 'Done') {

                    $('#like-count-' + testoId).text(res[1]);
                    $('#liked-' + testoId).text('');
                    $('#liked-' + testoId).html('<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" id="liked-' + testoId + '"></span>Liked');
                    document.getElementById("liked-" + testoId).onclick = null;
                } else {
                    alert('Something went wrong,Please try again later.!');
                }
            }
        });
    }
}

function likeBlog(blogId, userId) {

    if (blogId != '' && userId != '') {
        jQuery.ajax({
            type: "POST",
            url: site_url + "blog/likeBlog",
            data: {
                blogId: blogId,
                userId: userId,
            },
            cache: false,
            success: function(data) {
                var res = data.split('####');
                if (res[0] == 'Done') {

                    $('#like-count-' + blogId).text(res[1]);
                    $('#liked-' + blogId).text('');
                    $('#liked-' + blogId).html('<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" id="liked-' + blogId + '"></span>Liked');
                    document.getElementById("liked-" + blogId).onclick = null;
                } else {
                    alert('Something went wrong,Please try again later.!');
                }



            }
        });

    }

}

function likeArtist(compId, artistId, userId) {
    if (compId != '' && artistId != '' && userId != '') {
        jQuery.ajax({
            type: "POST",
            url: site_url + "artists/likeArtist",
            data: {
                compId: compId,
                artistId: artistId,
                userId: userId,
            },
            cache: true,
            success: function(data) {
                var res = data.split('####');
                if (res[0] == 'Done') {
                    $('#like-count-' + userId).text(res[1]);
                    $('#liked-' + compId).text('');
                    $('#liked-' + compId).html('<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" id="liked-' + compId + '"></span>Liked');
                    document.getElementById("liked-" + compId).onclick = null;
                } else {
                    location.reload();
                }
            }
        });
    }
}


function savedAsDraft(blogId, userId) {
    if (blogId != '' && userId != '') {
        jQuery.ajax({
            type: "POST",
            url: site_url + "blog/savedAsDraft",
            data: {
                blogId: blogId,
                userId: userId,
            },
            cache: false,
            success: function(data) {

                if (data == 'Done') {
                    $('#saved-' + blogId).text('');
                    $('#saved-' + blogId).html('<span  class="glyphicon glyphicon-bookmark" aria-hidden="true" ></span>Saved');
                    document.getElementById("saved-" + blogId).onclick = null;
                } else {
                    alert('Something went wrong,Please try again later.!');
                }

            }

        });
    }
}

function removedSaved(blogId, userId) {
    var r = confirm("Are you sure you want to delete!");
    if (r == true) {
        if (blogId != '' && userId != '') {
            jQuery.ajax({
                type: "POST",
                url: site_url + "blog/removedSaved",
                data: {
                    blogId: blogId,
                    userId: userId,
                },
                cache: false,
                success: function(data) {
                    if (data == 'Done') {
                        $('#saved-' + blogId).parents('.blog-bock:eq(0)').remove();
                    } else {
                        alert('Something went wrong,Please try again later.!');
                    }

                }

            });
        }
    }
}

function removedCollshop(shopId, userId) {

    var r = confirm("Are you sure you want to delete!");
    if (r == true) {
        if (shopId != '' && userId != '') {
            jQuery.ajax({
                type: "POST",
                url: site_url + "shop/removedCollectionShop",
                data: {
                    shopId: shopId,
                    userId: userId,
                },
                cache: false,
                success: function(data) {
                    if (data == 'Done') {
                        $('#collshop-' + shopId).parents('.blog-box:eq(0)').remove();

                    } else {
                        alert('Something went wrong,Please try again later.!');
                    }

                }

            });
        }
    }
}

function removedCollproduct(proId, userId) {

    var r = confirm("Are you sure you want to delete!");
    if (r == true) {
        if (proId != '' && userId != '') {
            jQuery.ajax({
                type: "POST",
                url: site_url + "shop/removedCollectionPro",
                data: {
                    proId: proId,
                    userId: userId,
                },
                cache: false,
                success: function(data) {
                    if (data == 'Done') {
                        $('#collproduct-' + proId).parents('.blog-box:eq(0)').remove();

                    } else {
                        alert('Something went wrong,Please try again later.!');
                    }

                }

            });
        }
    }
}



function removedSavedFolder(folderId) {
    var r = confirm("Are you sure you want to delete!");
    if (r == true) {
        if (folderId != '') {
            jQuery.ajax({
                type: "POST",
                url: site_url + "user/delete_collection_folder",
                data: {
                    folderId: folderId,
                },
                cache: false,
                success: function(data) {
                    if (data == 'Done') {
                        $('#folder-' + folderId).parents('.blog-box:eq(0)').remove();
                    } else {
                        alert('Something went wrong,Please try again later.!');
                    }

                }

            });
        }
    }
}

function removedFav(bookId, productId, userId) {
    var r = confirm("Are you sure you want to delete!");
    if (r == true) {

        if ((bookId != '' || productId != '') && userId != '') {
            jQuery.ajax({
                type: "POST",
                url: site_url + "shop/removedFav",
                data: {
                    bookId: bookId,
                    productId: productId,
                    userId: userId
                },
                cache: false,
                success: function(data) {
                    if (data == 'Done') {
                        if (bookId == 0) {
                            $('#pfav-' + productId).parents('.blog-box:eq(0)').remove();
                        } else {
                            $('#fav-' + bookId).parents('.blog-box:eq(0)').remove();
                        }
                    } else {
                        alert('Something went wrong,Please try again later.!');
                    }

                }

            });
        }
    }
}

$("#search-blog").keypress(function(event) {
    if (event.which == 13) {
        $("#blog-from-search").submit();
    }
});

// blog comment 
function post_comments(blogId) {
    if (blogId != '') {
        var comment = $('#blog_comments').val();
        if (comment.trim() == '') {
            $('#msg').html('<span class="text-danger">Please enter comment.</span>');
            $('#blog_comments').focus();
            return false
        }
        jQuery.ajax({
            type: "POST",
            url: site_url + "blog/post_comments",
            data: {
                blogId: blogId,
                comment: comment,
            },
            cache: false,
            success: function(data) {

                if (data == 'Done') {
                    $('#blog-comment-area').html('<label  class="text-success text-center display-block">Your comment has been received. Kindly allow for 24 hours before it appears on this page. Thank you.</label>');
                } else {
                    alert('Something went wrong,Please try again later.!');
                }
            }
        });
    }
}
function guestbook_contact_us() {

    var contact_message = $('#contact_message').val();

    if (contact_message.trim() == '') {
        $('#msg').html('<span class="text-danger">Please enter message.</span>');
        $('#contact_message').focus();
        return false
    }

    if ($("#g-recaptcha-response").val()) {

        //xyz = $("#g-recaptcha-response").val();
        jQuery.ajax({
            type: "POST",
            url: site_url + "home/guestbook_contact_us",
            data: {
                contact_message: contact_message,
                //captcha: xyz //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
            },
            cache: false,
            success: function(data) {
                //alert('--'+data);
                if (data == 'done') {
                    $('#contact_message').val('');
                    $('#msg').html('<span class="text-success">Mail sent successfully!!</span>');
                    $('#myModal').modal('hide')
                    $('#thankguestbookmodal').modal('toggle');
                }
                if (data == 'BlankMessage') {
                    $('#msg').html('<span class="text-danger">Please enter message!!</span>');
                    $('#contact_message').focus();
                }
                if (data == 'InvalidCaptcha') {
                    $('#msg').html('<span class="text-danger">Please enter valid captcha code!!</span>');
                    $('#g-recaptcha-response').focus();
                }
            }
        });

    } else {
        $('#msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
    }

}

//----------Printing


function checkColour(str) {
    // alert('In colour'+str);
    if (str == 'Border Colour') {
        $('#colour_row_id').show();
    } else {
        $('#colour_row_id').hide();
    }
}


function showHideWrap(str) {
    // alert('show hide wrap =='+str);
    if (str == 'Just the print') {
        $('#canvas_wrap_row_id').hide();
    } else {
        $('#canvas_wrap_row_id').show();
    }
}

function showHidePrinting(str) {
    //alert('str=='+str);
    if (str == 'Canvas Print' || str == 'Metallic Canvas') {
        $('#canvas_finishing_row_id').show();
    } else {
        $('#canvas_finishing_row_id').hide();
    }

}

function manage_printing_sizes(str) {
    var strSizes = '';
    //alert('***'+str);
    showHidePrinting(str);
    $('#canvas_wrap_row_id').hide();
    $('#colour_row_id').hide();

    if (str == 'Canvas Print') {
        strSizes = '<option value="">Size</option><option value="8 x 7 inches">8 x 7 inches</option><option value="10 x 8 inches">10 x 8 inches</option><option value="12 x 10 inches">12 x 10 inches</option><option value="16 x 13 inches">16 x 13 inches</option><option value="18 x 15 inches">18 x 15 inches</option><option value="22 x 18 inches">22 x 18 inches</option><option value="24 x 20 inches">24 x 20 inches</option><option value="28 x 23 inches">28 x 23 inches</option><option value="30 x 25 inches">30 x 25 inches</option><option value="34 x 28 inches">34 x 28 inches</option><option value="36 x 30 inches">36 x 30 inches</option><option value="38 x 31 inches">38 x 31 inches</option><option value="40 x 33 inches">40 x 33 inches</option><option value="42 x 35 inches">42 x 35 inches</option><option value="44 x 36 inches">44 x 36 inches</option><option value="46 x 38 inches">46 x 38 inches</option><option value="48 x 40 inches">48 x 40 inches</option><option value="50 x 41 inches">50 x 41 inches</option><option value="52 x 43 inches">52 x 43 inches</option><option value="54 x 45 inches">54 x 45 inches</option><option value="56 x 46 inches">56 x 46 inches</option>';
        $('#finishing_row_id').hide();
    } else if (str == 'Metallic Canvas') {
        strSizes = '<option value="">Size</option><option value="8 x 7 inches">8 x 7 inches</option><option value="10 x 8 inches">10 x 8 inches</option><option value="12 x 10 inches">12 x 10 inches</option><option value="16 x 13 inches">16 x 13 inches</option><option value="18 x 15 inches">18 x 15 inches</option><option value="22 x 18 inches">22 x 18 inches</option><option value="24 x 20 inches">24 x 20 inches</option><option value="28 x 23 inches">28 x 23 inches</option><option value="30 x 25 inches">30 x 25 inches</option><option value="34 x 28 inches">34 x 28 inches</option><option value="36 x 30 inches">36 x 30 inches</option><option value="38 x 31 inches">38 x 31 inches</option><option value="40 x 33 inches">40 x 33 inches</option><option value="42 x 35 inches">42 x 35 inches</option><option value="44 x 36 inches">44 x 36 inches</option><option value="46 x 38 inches">46 x 38 inches</option><option value="48 x 40 inches">48 x 40 inches</option>';
        $('#finishing_row_id').hide();
    } else if (str == 'Acrylic Prints (Fine Art)' || str == 'Direct Acrylic Print (S)' || str == 'Direct Acrylic Print (D)') {
        strSizes = '<option value="">Size</option><option value="8 x 11 inches">8 x 11 inches</option><option value="9 x 12 inches">9 x 12 inches</option><option value="10 x 13 inches">10 x 13 inches</option><option value="12 x 16 inches">12 x 16 inches</option><option value="14 x 19 inches">14 x 19 inches</option><option value="16 x 21 inches">16 x 21  inches</option><option value="18 x 24 inches">18 x 24 inches</option><option value="20 x 27 inches">20 x 27 inches</option><option value="22 x 29 inches">22 x 29 inches</option><option value="24 x 32 inches">24 x 32 inches</option><option value="26 x 35 inches">26 x 35 inches</option><option value="28 x 37 inches">28 x 37 inches</option><option value="30 x 40 inches">30 x 40 inches</option><option value="32 x 43 inches">32 x 43 inches</option><option value="34 x 45 inches">34 x 45 inches</option><option value="36 x 48 inches">36 x 48 inches</option><option value="38 x 51 inches">38 x 51 inches</option><option value="40 x 53 inches">40 x 53 inches</option><option value="42 x 56 inches">42 x 56 inches</option><option value="44 x 59 inches">44 x 59 inches</option><option value="46 x 61 inches">46 x 61 inches</option><option value="48 x 64 inches">48 x 64 inches</option><option value="50 x 66 inches">50 x 66 inches</option><option value="52 x 69 inches">52 x 69 inches</option><option value="54 x 72 inches">54 x 72 inches</option><option value="56 x 74 inches">56 x 74 inches</option>';
        $('#finishing_row_id').show();
    } else if (str == 'Print Mount on Metal' || str == 'Direct Metal Print' || str == 'Entrada Rag Natural' || str == 'Metallic Photo Paper' || str == 'Premium Photo Gloss' || str == 'Premium Photo Luster' || str == 'Premium Photo Satin') {
        strSizes = '<option value="">Size</option><option value="8 x 11 inches">8 x 11 inches</option><option value="9 x 12 inches">9 x 12 inches</option><option value="10 x 13 inches">10 x 13 inches</option><option value="12 x 16 inches">12 x 16 inches</option><option value="14 x 19 inches">14 x 19 inches</option><option value="16 x 21 inches">16 x 21  inches</option><option value="18 x 24 inches">18 x 24 inches</option><option value="20 x 27 inches">20 x 27 inches</option><option value="22 x 29 inches">22 x 29 inches</option><option value="24 x 32 inches">24 x 32 inches</option><option value="26 x 35 inches">26 x 35 inches</option><option value="28 x 37 inches">28 x 37 inches</option><option value="30 x 40 inches">30 x 40 inches</option><option value="32 x 43 inches">32 x 43 inches</option><option value="34 x 45 inches">34 x 45 inches</option><option value="36 x 48 inches">36 x 48 inches</option><option value="38 x 51 inches">38 x 51 inches</option><option value="40 x 53 inches">40 x 53 inches</option><option value="42 x 56 inches">42 x 56 inches</option><option value="44 x 59 inches">44 x 59 inches</option><option value="46 x 61 inches">46 x 61 inches</option><option value="48 x 64 inches">48 x 64 inches</option><option value="50 x 66 inches">50 x 66 inches</option><option value="52 x 69 inches">52 x 69 inches</option><option value="54 x 72 inches">54 x 72 inches</option><option value="56 x 74 inches">56 x 74 inches</option>';
        $('#finishing_row_id').hide();
    } else if (str == 'Print Mount on Bamboo' || str == 'Direct Bamboo Print') {
        strSizes = '<option value="">Size</option><option value="8 x 11 inches">8 x 11 inches</option><option value="9 x 12 inches">9 x 12 inches</option><option value="10 x 13 inches">10 x 13 inches</option><option value="12 x 16 inches">12 x 16 inches</option><option value="14 x 19 inches">14 x 19 inches</option><option value="16 x 21 inches">16 x 21  inches</option><option value="18 x 24 inches">18 x 24 inches</option><option value="20 x 27 inches">20 x 27 inches</option><option value="22 x 29 inches">22 x 29 inches</option><option value="24 x 32 inches">24 x 32 inches</option><option value="26 x 35 inches">26 x 35 inches</option><option value="28 x 37 inches">28 x 37 inches</option><option value="30 x 40 inches">30 x 40 inches</option><option value="32 x 43 inches">32 x 43 inches</option><option value="34 x 45 inches">34 x 45 inches</option><option value="36 x 48 inches">36 x 48 inches</option><option value="38 x 51 inches">38 x 51 inches</option><option value="40 x 53 inches">40 x 53 inches</option><option value="42 x 56 inches">42 x 56 inches</option><option value="44 x 59 inches">44 x 59 inches</option><option value="46 x 61 inches">46 x 61 inches</option><option value="48 x 64 inches">48 x 64 inches</option>';
        $('#finishing_row_id').hide();
    } else if (str == 'German Etching' || str == 'Photo Rag Pearl' || str == 'Enhanced Matte Paper') {
        strSizes = '<option value="">Size</option><option value="8 x 11 inches">8 x 11 inches</option><option value="9 x 12 inches">9 x 12 inches</option><option value="10 x 13 inches">10 x 13 inches</option><option value="12 x 16 inches">12 x 16 inches</option><option value="14 x 19 inches">14 x 19 inches</option><option value="16 x 21 inches">16 x 21  inches</option><option value="18 x 24 inches">18 x 24 inches</option><option value="20 x 27 inches">20 x 27 inches</option><option value="22 x 29 inches">22 x 29 inches</option><option value="24 x 32 inches">24 x 32 inches</option><option value="26 x 35 inches">26 x 35 inches</option><option value="28 x 37 inches">28 x 37 inches</option><option value="30 x 40 inches">30 x 40 inches</option><option value="32 x 43 inches">32 x 43 inches</option><option value="34 x 45 inches">34 x 45 inches</option><option value="36 x 48 inches">36 x 48 inches</option><option value="38 x 51 inches">38 x 51 inches</option><option value="40 x 53 inches">40 x 53 inches</option><option value="42 x 56 inches">42 x 56 inches</option>';
        $('#finishing_row_id').hide();
    }

    //alert('**'+strSizes);
    $('#size').html(strSizes);

}

function printing_contact_us_email() {
    var contact_name = $('#pcontact_name').val();
    var contact_email = $('#pcontact_email').val();
    var contact_subject = $('#pcontact_subject').val();
    var contact_message = $('#pcontact_message').val();
    var department = $('#pdepartment').val();
    if (contact_name == '') {
        $('#printing_contact_msg').html('<span class="text-danger">Please enter name.</span>');
        $('#pcontact_name').focus();
        return false
    }
    if (contact_email == '') {
        $('#printing_contact_msg').html('<span class="text-danger">Please enter email address.</span>');
        $('#pcontact_email').focus();
        return false
    }
    if (department == '') {
        $('#printing_contact_msg').html('<span class="text-danger">Please select service.</span>');
        $('#pdepartment').focus();
        return false
    }
    if (contact_subject == '') {
        $('#printing_contact_msg').html('<span class="text-danger">Please enter subject.</span>');
        $('#pcontact_subject').focus();
        return false
    }

    if (contact_message == '') {
        $('#printing_contact_msg').html('<span class="text-danger">Please enter message.</span>');
        $('#pcontact_message').focus();
        return false
    }
    if (contact_email != '' && contact_name != '') {

        jQuery.ajax({
            type: "POST",
            url: site_url + "cms/printing_contact_us_email",
            data: {
                contact_name: contact_name,
                contact_email: contact_email,
                contact_message: contact_message,
                contact_subject: contact_subject,
                department: department
            },
            cache: false,
            success: function(data) {
                if (data == 'done') {
                    $('#pcontact_name').val('')
                    $('#pcontact_email').val('')
                    $('#pcontact_message').val('')
                    $('#pcontact_subject').val('')
                    $('#pdepartment').val('')
                    $('#printing_contact_msg').html('<span class="text-success">Mail sent successfully!!</span>')
                    $('#myModalContactPrinting').modal('hide')
                    $('#thanksContactPrinting').modal('toggle');
                }

                if (data == 'NameBlank') {
                    $('#printing_contact_msg').html('<span class="text-danger">Name can not be blank!!</span>');
                    $('#NameBlank').focus()
                }
                if (data == 'Emailblank') {
                    $('#printing_contact_msg').html('<span class="text-danger">Email address can not be blank!!</span>');
                    $('#pcontact_email').focus();
                }
                if (data == 'InvalidEmail') {
                    $('#printing_contact_msg').html('<span class="text-danger">Please enter valid e-mail address!!</span>');
                    $('#pcontact_email').focus();
                }
            }
        });

    } else {
        $('#printing_contact_msg').html('<span class="text-danger">Please fill details!!</span>');
    }

}
//----------Printing 
//--------shop 
function collectArtWork(shopId, userId) {
    //
    if (shopId != '' && userId != '') {
        jQuery.ajax({
            type: "POST",
            url: site_url + "shop/collectArtWork",
            data: {
                shopId: shopId,
                userId: userId,
            },
            cache: false,
            success: function(data) {
                var res = data.trim();
                if (res == 'Done') {
                    alert('Artwork added in collection successfully.');
                    $('#artWorkHorizonatalCollection_' + shopId).addClass('active');
                    $("#artWorkHorizonatalCollection_" + shopId).removeAttr("onclick");

                    $('#artWorkVericalCollection_' + shopId).addClass('active');
                    $("#artWorkVericalCollection_" + shopId).removeAttr("onclick");
                } else {
                    alert('Something went wrong,Please try again later.!');
                }
            }
        });
    }
}
function shopLike(shopId, productId, userId) {
    if (productId != '' && userId != '') {
        jQuery.ajax({
            type: "POST",
            url: site_url + "shop/shopLike",
            data: {
                shopId: shopId,
                productId: productId,
                userId: userId
            },
            cache: false,
            success: function(data) {
                var res = data.split('####');
                if (res[0] == 'Done') {
                    $('#artWorkHorizonatalLike_' + productId).addClass('active');
                    $("#artWorkHorizonatalLike_" + productId).removeAttr("onclick");
                    $('#artWorkVericalLike_' + productId).addClass('active');
                    $("#artWorkVericalLike_" + productId).removeAttr("onclick");
                    $('#totalLiked_' + productId).html(res[1]);
                    $('#totalLikedVertical_' + productId).html(res[1]);
                } else {
                    alert('Something went wrong,Please try again later.!');
                }
            }
        });
    }
}
function collectArtWorkBook(shopId, userId) {

    if (shopId != '' && userId != '') {
        jQuery.ajax({
            type: "POST",
            url: site_url + "shop/collectArtWork",
            data: {
                shopId: shopId,
                userId: userId,
            },
            cache: false,
            success: function(data) {
                var res = data.trim();
                if (res == 'Done') {
                    alert('Artwork added in collection successfully.');
                    $('#artWorkHorizonatalCollectionBook_' + shopId).addClass('active');
                    $("#artWorkHorizonatalCollectionBook_" + shopId).removeAttr("onclick");
                } else {
                    alert('Something went wrong,Please try again later.!');
                }

            }
        });

    }

}
function shopLikeBook(shopId, productId, userId) {
    if (shopId != '' && userId != '') {
        jQuery.ajax({
            type: "POST",
            url: site_url + "shop/shopLike",
            data: {
                shopId: shopId,
                productId: productId,
                userId: userId
            },
            cache: false,
            success: function(data) {
                var res = data.split('####');
                if (res[0] == 'Done') {
                    $('#artWorkHorizonatalLikeBook_' + shopId).addClass('active');
                    $("#artWorkHorizonatalLikeBook_" + shopId).removeAttr("onclick");
                    $('#totalLikedBook_' + shopId).html(res[1]);

                } else {
                    alert('Something went wrong,Please try again later.!');
                }
            }
        });

    }

}
//--------Shop End