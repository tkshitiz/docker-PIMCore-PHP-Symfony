<?php

namespace App\Controller;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use Pimcore\Controller\FrontendController;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Model\Asset;
use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Model\Document;


class ContentController extends FrontendController
{
    #[Template('content/default.html.twig')]
    public function defaultAction (Request $request): array
    {
        return [];
    }
    // Emmet example
    // header>img.logo+nav>ul.menu>(li>a)*3

  

    public function headerAction(Request $request): Response
    {
        return $this->render('header/header.html.twig');
    }

    public function HomeAction(Request $request): Response
    {
        return $this->render('content/home.html.twig');
    }
    public function blogCardAction(Request $request): Response
    {
        $document = Document::getById($request->get('id'));
        if (!$document || $document->getParent()->getKey() !== 'blog-posts') {
            return new Response("invalid blog");
        }
        return $this->render("blogcard/blog-card.html.twig", ['document' => $document]);
    }
    public function aboutAction(Request $request, PaginatorInterface $paginator): Response
    { 
        $galleryAsset = Asset::getByPath('/2081');
        $imagesOfFolders = [];
    
        if ($galleryAsset) {
            foreach ($galleryAsset->getChildren() as $locationFolder) {
                $imagesOfFolders[] = $locationFolder;
            }
        }
     
        // Paginate the folders
        $pagination = $paginator->paginate(
            $imagesOfFolders, // this is the array of items to paginate
            $request->query->getInt('page', 1), // current page number, defaults to 1
            6 // limit per page
        );
    

        return $this->render('pages/about.html.twig',['pagination' => $pagination,]);
    }
    


    public function myPassionAction(Request $request): Response
    {
        return $this->render('pages/mypassion.html.twig');
    }

    public function mygalleryAction(Request $request, PaginatorInterface $paginator): Response
    {
        $galleryAsset = Asset::getByPath('/2081');
        $imagesOfFolders = [];
    
        if ($galleryAsset) {
            foreach ($galleryAsset->getChildren() as $locationFolder) {
                $imagesOfFolders[] = $locationFolder;
            }
        }
     
        // Paginate the folders
        $pagination = $paginator->paginate(
            $imagesOfFolders, // this is the array of items to paginate
            $request->query->getInt('page', 1), // current page number, defaults to 1
            6 // limit per page
        );
        return $this->render('pages/gallery.html.twig', [
            'pagination' => $pagination, 
         
        ]);
    }
    

    public function blogAction(Request $request): Response
    {
        return $this->render('pages/blog.html.twig');
    }
   
    public function blogListAction(Request $request): Response
    {
        $blogs  = new Document\Listing();
        // $blogs->setUnpublished(1);
        $parent = Document::getByPath('/blog-posts');
        $blogs->setCondition('parentId=:parentId', ['parentId' => $parent->getId()]);
        $blogs->setOrderKey('creationDate');
        $blogs->setOrder('DESC');
      
        return $this->render('pages/blog-list.html.twig',[
            'blogs' => $blogs
        ]);
    }

    public function footerAction(Request $request): Response
    {
        return $this->render('footer/footer.html.twig');
    }  
    
  
    // #[Template('gallery/galleryrenderlet.html.twig')] 
    // public function GalleryPageAction(Request $request) : array
    // {
        
    // }

    

   #[Template('homepagephotos/photos.html.twig')] 
    public function DragAndDropGalleryAction(Request $request) : array
    {
        if ('asset' === $request->get('type')) {
            $asset = Asset::getById((int) $request->get('id'));
            if ('folder' === $asset->getType()) {
                return [
                    'assets' => $asset->getChildren()
                ];
            }
        }
    
        return [];
    }
}