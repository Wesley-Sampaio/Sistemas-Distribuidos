package resource;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import javax.ws.rs.Consumes;
import javax.ws.rs.DELETE;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;

import model.Hotel;

@Path("/hoteis")
public class HotelResource {

    static private Map<Integer, Hotel> hoteisMap;

    static {
        hoteisMap = new HashMap<Integer, Hotel>();

        Hotel c1 = new Hotel();
        c1.setId(1);
        c1.setNome("Hotel Cafu");
        c1.setEndereco("Rua Ida");
        c1.setBairro("Cerqueira Cesar");
        c1.setNumero("128");
        c1.setComplemento("Perto do posto");
        c1.setCidade("Sao Paulo");
        c1.setEstado("SP");
        c1.setCep("04512854");       
        hoteisMap.put(c1.getId(), c1);

        Hotel c2 = new Hotel();
        c2.setId(2);
        c2.setNome("Hotel Panama");
        c2.setEndereco("Av. Paulista");
        c2.setBairro("Cerqueira Cesar");
        c2.setNumero("128");
        c2.setComplemento("Perto do posto");
        c2.setCidade("Sao Paulo");
        c2.setEstado("SP");
        c2.setCep("04512854");       
        hoteisMap.put(c2.getId(), c2);

        Hotel c3 = new Hotel();
        c3.setId(3);
        c3.setNome("Hotel Africa");
        c3.setEndereco("Av. Paulista");
        c3.setBairro("Cerqueira Cesar");
        c3.setNumero("128");
        c3.setComplemento("Perto do posto");
        c3.setCidade("Sao Paulo");
        c3.setEstado("SP");
        c3.setCep("04512854");  
        hoteisMap.put(c3.getId(), c3);

    }

    @GET
    @Produces("application/json")
    public List<Hotel> listarHoteis() {
        return new ArrayList<Hotel>(hoteisMap.values());
    }

    @POST
    @Produces("application/json")
    @Consumes("application/json")
    public String adicionarHotel(Hotel hotel) {
        hotel.setId(hoteisMap.size() + 1);
        hoteisMap.put(hotel.getId(), hotel);
        return hotel.getNome() + " adicionado.";
    }

    @DELETE
    @Produces("application/json")
    @Path("{id}")
    public String removerHotel(@PathParam("id") int id) {
        hoteisMap.remove(id);
        return "Hotel removido.";
    }

}