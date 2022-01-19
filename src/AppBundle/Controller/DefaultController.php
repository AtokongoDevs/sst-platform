<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetalleUsuario;
use AppBundle\Entity\Empresa;
use AppBundle\Entity\Status;
use AppBundle\Entity\Usuario;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage",methods={"POST"})
     * @throws Exception
     */
    public function indexAction(Request $request)
    {
        $data = json_decode($request->getContent(),1);
        $entityManager = $this -> getDoctrine() -> getManager();

        $empresa = $entityManager->find("AppBundle:Empresa",$data['id_empresa']);
        if(!$empresa){
            return new JsonResponse(['msg'=>'Empresa no existe'],404);
        }

        $detalleUsuario = new DetalleUsuario();
        $detalleUsuario->setNombre($data['nombre']);
        $detalleUsuario->setApellido($data['apellido']);
        $detalleUsuario->setCreatedAt();
        $detalleUsuario->setUpdatedAt();
        $detalleUsuario->setEmpresa($empresa);

        $usuario = new Usuario();
        $usuario->setUsername($data['username']);
        $usuario->setPassword($data['password']);
        $usuario->setDetalleUsuario($detalleUsuario);
        $detalleUsuario->setUsuario($usuario);

        $entityManager->persist($usuario);
        $entityManager->persist($detalleUsuario);
        $entityManager->flush();
        return new JsonResponse(['msg'=>'OK'],200);
    }
    /**
     * @Route ("/get",methods={"GET"})
     */
    public function getAction(Request $request){
        $data = json_decode($request->getContent(),1);
        $entityManager = $this -> getDoctrine() -> getManager();
        $detalleUsuario = $entityManager->find('AppBundle:DetalleUsuario',$data['id']);
        if($detalleUsuario === null){
            return new JsonResponse(['msg'=>'No encontrado'],404);
        }
        return new JsonResponse([
            'id'=>$detalleUsuario->getId(),
            'nombre'=>$detalleUsuario->getNombre(),
            'apellido'=>$detalleUsuario->getApellido(),
            'created_ad'=>$detalleUsuario->getCreatedAt(),
            'username'=>$detalleUsuario->getUsuario()->getUsername(),
            'password'=>$detalleUsuario->getUsuario()->getPassword()],200);
    }
    /**
     * @Route ("/update",methods={"PUT"})
     */
    public function updateAction(Request $request){
        $data = json_decode($request->getContent(),1);
        $entityManager = $this -> getDoctrine() -> getManager();
        $detalleUsuario = $entityManager->find('AppBundle:DetalleUsuario',$data['id']);
        if($detalleUsuario === null){
            return new JsonResponse(['msg'=>'No encontrado'],404);
        }
        $detalleUsuario->setNombre($data['nombre']);
        $entityManager->flush();
        return new JsonResponse(['msg'=>'Ok'],200);
    }

    /**
     * @Route ("/empresa/create",methods={"POST"})
     * @throws Exception
     */
    public function createEmpresaAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        //Creación de objeto Empresa con los datos dentro del array
        $empresa = new Empresa();
        $empresa->setDireccionFiscal($data['direccion_fiscal']);
        $empresa->setRazonSocial($data['razon_social']);
        $empresa->setRuc($data['ruc']);
        $empresa->setNombreComercial($data['nombre_comercial']);
        try{
            $empresa->setCreatedAt();
            $empresa->setUpdatedAt();
        }catch(Exception $exception) {
            return new JsonResponse([
                'msg' => 'Error con la asignación de fecha',
                'exception'=>$exception->getMessage()], 505);
        }

        $entityManager->persist($empresa);
        $entityManager->flush();

        return new JsonResponse(['msg'=>'Empresa creada con éxito'],200);
    }
    /**
     * @Route ("/status/create",methods={"POST"})
     */
    public function createStatusAction(Request $request){
        $data = json_decode($request->getContent(),1); //Obtenemos la data y la convertimos a un array

        $entityManager = $this -> getDoctrine() -> getManager();

        //Creación de objeto Status con los datos dentro del array
        $status = new Status();
    }
}
